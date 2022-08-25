<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(MediaSeeder::class);
        $this->call(PageSeeder::class);

        if (class_exists('App\Models\Post')) {
            $ths->call(PostSeeder::class);
        }

        if (class_exists('App\Models\Runway')) {
            $ths->call(RunwaySeeder::class);
        }

        if (class_exists('App\Models\Faq')) {
            $ths->call(FaqSeeder::class);
        }

        if (class_exists('App\Models\Sheet')) {
            $ths->call(SheetSeeder::class);
        }

        if (class_exists('App\Models\DiscoveryTopic')) {
            $ths->call(DiscoveryTopicSeeder::class);
        }

        if (class_exists('App\Models\DiscoveryArticle')) {
            $ths->call(DiscoveryArticleSeeder::class);
        }
    }
}
