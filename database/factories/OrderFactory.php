<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id'=>Customer::inRandomOrder()->first()->customer_id,
            'order_payment_type'=>$this->faker->randomElement(['cash', 'card']),
            'order_complete'=>$this->faker->boolean(0.5)
        ];
    }
}
