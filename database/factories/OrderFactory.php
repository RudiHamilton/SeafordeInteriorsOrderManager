<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
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
            'product_id'=>Product::inRandomOrder()->first()->product_id,
            'order_payment_type'=>$this->faker->randomElement(['cash', 'card']),
            'order_profit'=>$this->faker->randomNumber(),
            'order_quantity'=>$this->faker->randomNumber(),
            'order_net_profit'=>$this->faker->randomNumber(),
            'order_cost_to_make'=>$this->faker->randomNumber(),
            'order_complete'=>$this->faker->boolean(0.5)
        ];
    }
}
