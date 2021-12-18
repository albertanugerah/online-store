<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape([
        'title' => "string", 'description' => "string", 'price' => "int", 'image' => "string"
    ])] public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->text(120),
            'price' => $this->faker->numberBetween(10000, 100000),
            'image' => '',
        ];
    }
}
