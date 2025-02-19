<?php

namespace Database\Factories;

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
            'product_name'=>fake()->name(),
            'product_price'=>fake()->randomNumber(4,true),
            'product_cost_to_make'=>fake()->randomNumber(4,true),
            'product_current_stock'=>fake()->randomNumber(2,true)
        ];
    }
}
