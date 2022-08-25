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
            $this->call(PostSeeder::class);
        }

        if (class_exists('App\Models\Runway')) {
            $this->call(RunwaySeeder::class);
        }

        if (class_exists('App\Models\Faq')) {
            $this->call(FaqSeeder::class);
        }

        if (class_exists('App\Models\Sheet')) {
            $this->call(SheetSeeder::class);
        }

        if (class_exists('App\Models\DiscoveryTopic')) {
            $this->call(DiscoveryTopicSeeder::class);
        }

        if (class_exists('App\Models\DiscoveryArticle')) {
            $this->call(DiscoveryArticleSeeder::class);
        }
    }
}
