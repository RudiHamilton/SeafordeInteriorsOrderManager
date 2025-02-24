<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_first_name'=>fake()->name(),
            'customer_second_name'=>fake()->name(),
            'customer_email'=>fake()->unique()->email(),
            'customer_phone'=>fake()->numberBetween(1,10),
            'customer_firstline_address'=>fake()->address(),
            'customer_secondline_address'=>fake()->address(),
            'customer_postcode'=>fake()->postcode(),

            
        ];
    }
}
