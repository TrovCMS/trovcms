<?php

namespace Database\Factories;

use App\Models\Meta;
use FilamentCurator\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MetaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Str::ucfirst($this->faker->words(rand(2, 6), true)),
            'description' => $this->faker->text,
            'indexable' => $this->faker->boolean,
            'og_image' => Media::inRandomOrder()->limit(1)->first()->id,
        ];
    }
}
