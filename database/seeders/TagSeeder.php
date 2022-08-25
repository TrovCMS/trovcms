<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Tags\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $faqTags = [
            'In Store Personal Loans Title Loans',
            'Titlemax Online Loans',
            'Process',
            'Qualifications',
            'Payments',
            'Bad Credit Loans',
            'TitleMax Customer Portal',
            'TitleMax Vehicle Appraisal Process',
            'Notary Public Services',
            'Flexible Line of Credit',
        ];

        foreach ($faqTags as $tag) {
            Tag::create([
                'name' => $tag,
                'slug' => Str::of($tag)->slug(),
                'type' => 'faq',
            ]);
        }

        foreach (range(1, 15) as $index) {
            $name = $faker->words(rand(1, 5), true);
            Tag::create([
                'name' => $name,
                'slug' => Str::of($name)->slug(),
                'type' => 'post',
            ]);
        }
    }
}
