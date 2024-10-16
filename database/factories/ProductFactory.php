<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'category_id'=>Category::factory(),
            'name'=>fake()->text(20),
            'description'=>fake()->text(50),
            'price'=>fake()->randomFloat(8,50,100),
            'stock'=>fake()->randomDigit(),
        ];
    }
}
