<?php

namespace Database\Seeders;

use App\Models\Meta;
use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::factory()->published()->hasImageHero()->create([
            'front_page' => true,
        ])->each(function ($page) {
            $meta = Meta::factory()->make([
                'metaable_id' => $page->id,
                'metaable_type' => 'App\Models\Page',
            ]);

            return $page->meta()->create($meta->toArray());
        });

        Page::factory()->count(3)->create()->each(function ($page) {
            $meta = Meta::factory()->make([
                'metaable_id' => $page->id,
                'metaable_type' => 'App\Models\Page',
            ]);

            return $page->meta()->create($meta->toArray());
        });

        Page::factory()->count(5)->inReview()->hasImageHero()->create()->each(function ($page) {
            $meta = Meta::factory()->make([
                'metaable_id' => $page->id,
                'metaable_type' => 'App\Models\Page',
            ]);

            return $page->meta()->create($meta->toArray());
        });

        Page::factory()->count(15)->published()->hasImageHero()->create()->each(function ($page) {
            $meta = Meta::factory()->make([
                'metaable_id' => $page->id,
                'metaable_type' => 'App\Models\Page',
            ]);

            return $page->meta()->create($meta->toArray());
        });

        Page::factory()->count(2)->published()->hasVideoHero()->create()->each(function ($page) {
            $meta = Meta::factory()->make([
                'metaable_id' => $page->id,
                'metaable_type' => 'App\Models\Page',
            ]);

            return $page->meta()->create($meta->toArray());
        });
    }
}
