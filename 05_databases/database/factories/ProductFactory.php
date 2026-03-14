<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->name(),
            'short_description'=> fake()->sentence(),
            //3 frases en un párrafo
            'description'=> fake()->paragraph(3),
            'price'=>fake()->numberBetween(3,19),
        ];
    }
}
