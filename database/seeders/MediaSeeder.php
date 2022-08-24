<?php

namespace Database\Seeders;

use FilamentCurator\Facades\CuratorThumbnails;
use FilamentCurator\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filedata = Storage::disk('local')->get('data/media.json');

        if ($filedata) {
            $json = json_decode($filedata);

            foreach ($json as $file) {
                Media::withoutEvents(function () use ($file) {
                    Media::create((array) $file);
                });
            }
        } else {
            $faker = (new \Faker\Factory)->create();
            $files = File::files(database_path().'/seeders/trov-seed-images/');

            if ($files) {
                foreach ($files as $file) {
                    $data = Image::make($file->getPathname());

                    Media::withoutEvents(function () use ($data, $faker) {
                        $media = Media::create([
                            'public_id' => config('filament-curator.directory').'/'.$data->filename,
                            'filename' => config('filament-curator.directory').'/'.$data->filename.'.'.$data->extension,
                            'ext' => $data->extension,
                            'type' => 'image',
                            'alt' => $faker->words(rand(3, 8), true),
                            'title' => '',
                            'caption' => '',
                            'description' => '',
                            'width' => $data->getWidth(),
                            'height' => $data->getHeight(),
                            'disk' => config('filament-curator.disk'),
                            'directory' => config('filament-curator.directory'),
                            'size' => $data->filesize(),
                        ]);

                        Storage::disk(config('filament-curator.disk'))->put(config('filament-curator.directory').'/'.$data->filename.'.'.$data->extension, $data->encode(null, '80'));
                        CuratorThumbnails::generate($media);
                    });
                }

                $mediaRecords = Media::all();
                $data = $mediaRecords->makeHidden(['url', 'thumbnail_url', 'medium_url', 'large_url', 'size_for_humans', 'hasSizes'])->toJson();
                Storage::disk('local')->put('data/media.json', $data);
            }
        }
    }
}
