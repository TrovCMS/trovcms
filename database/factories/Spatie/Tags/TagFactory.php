<?php

namespace Database\Factories\Spatie\Tags;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TagFactory extends Factory
{
    protected $model = 'Spatie\Tags\Tag';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->words(rand(1, 5), true);

        return [
            'name' => $name,
            'slug' => Str::of($name)->slug(),
            'type' => null,
        ];
    }
}
