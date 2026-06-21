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
            'name' => fake()->name(),
            'slug' => fn (array $attributes) => Str::slug($attributes['name']),
            'price' => fake()->numberBetween(1, 100),
            'stock' => fake()->numberBetween(1, 5),
            'description' => fake()->text(40),
        ];
    }
}
