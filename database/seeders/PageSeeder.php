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
        Page::factory(1)->published()->hasImageHero()->create([
            'title' => 'Welcome',
            'slug' => 'welcome',
            'front_page' => true,
            'content' => [
                [
                    'full_width' => false,
                    'bg_color' => '',
                    'blocks' => [
                        [
                            'type' => 'rich-text',
                            'data' => [
                                'content' => '<h1>Praesentium Consequuntur Qui Repudiandae Quo Deserunt Sed</h1><p class="lead">Provident architecto et recusandae nulla et sint voluptate. Est vero nisi nulla libero. Dolor necessitatibus consequuntur occaecati quae porro sed quisquam. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis.</p><div class="filament-tiptap-grid" type="responsive" cols="3"><div class="filament-tiptap-grid__column"><h2>Praesentium Consequuntur</h2><p>Provident architecto et recusandae nulla et sint voluptate. Est vero nisi nulla libero. Dolor necessitatibus consequuntur occaecati quae porro sed quisquam. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis.</p></div><div class="filament-tiptap-grid__column"><h2>Qui Repudiandae Quo Deserunt Sed</h2><p>Provident architecto et recusandae nulla et sint voluptate. Est vero nisi nulla libero. Dolor necessitatibus consequuntur occaecati quae porro sed quisquam. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis.</p></div><div class="filament-tiptap-grid__column"><h2>Repudiandae Quo Deserunt Sed</h2><p>Provident architecto et recusandae nulla et sint voluptate. Est vero nisi nulla libero. Dolor necessitatibus consequuntur occaecati quae porro sed quisquam. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis.</p></div></div><h3>Praesentium Consequuntur Qui Repudiandae Quo Deserunt Sed</h3><p>Provident architecto et recusandae nulla et sint voluptate. Est vero nisi nulla libero. Dolor necessitatibus consequuntur occaecati quae porro sed quisquam. Deleniti occaecati tenetur quisquam et odio necessitatibus. Blanditiis ut quia perspiciatis.</p><h2>Dolore Quasi Et A Voluptas Totam Voluptate At</h2><ul class="checked-list"><li><p>Qui est veniam quae cum est nihil. Animi odit mollitia inventore expedita aliquid cum.</p></li><li><p>Quia ut amet ipsum repudiandae. Quia et quasi quibusdam enim.</p></li><li><p>Error accusamus laboriosam reprehenderit earum mollitia quo. Beatae quibusdam et quo ut fugiat culpa. A impedit fuga ipsam quo et. Corrupti et beatae culpa et excepturi delectus voluptas.</p></li></ul>',
                            ],
                        ],
                    ],
                ],
            ],
        ])->each(function ($page) {
            return $page->meta()->create(Meta::factory()->make([
                'metaable_id' => $page->id,
                'metaable_type' => 'App\Models\Page',
            ])->toArray());
        });

        Page::factory(1)->published()->hasImageHero()->create([
            'title' => 'About',
            'slug' => 'about',
        ])->each(function ($page) {
            return $page->meta()->create(Meta::factory()->make([
                'metaable_id' => $page->id,
                'metaable_type' => 'App\Models\Page',
            ])->toArray());
        });

        Page::factory(1)->published()->hasImageHero()->create([
            'title' => 'Contact Us',
            'slug' => 'contact',
        ])->each(function ($page) {
            return $page->meta()->create(Meta::factory()->make([
                'metaable_id' => $page->id,
                'metaable_type' => 'App\Models\Page',
            ])->toArray());
        });

        Page::factory(3)->create()->each(function ($page) {
            return $page->meta()->create(Meta::factory()->make([
                'metaable_id' => $page->id,
                'metaable_type' => 'App\Models\Page',
            ])->toArray());
        });

        Page::factory(5)->inReview()->hasImageHero()->create()->each(function ($page) {
            return $page->meta()->create(Meta::factory()->make([
                'metaable_id' => $page->id,
                'metaable_type' => 'App\Models\Page',
            ])->toArray());
        });

        Page::factory(15)->published()->hasImageHero()->create()->each(function ($page) {
            return $page->meta()->create(Meta::factory()->make([
                'metaable_id' => $page->id,
                'metaable_type' => 'App\Models\Page',
            ])->toArray());
        });

        Page::factory(2)->published()->hasVideoHero()->create()->each(function ($page) {
            return $page->meta()->create(Meta::factory()->make([
                'metaable_id' => $page->id,
                'metaable_type' => 'App\Models\Page',
            ])->toArray());
        });
    }
}
