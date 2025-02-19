<?php

namespace Database\Seeders;

use App\Models\OrderProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numOfOrderProduct = 50;
        OrderProduct::factory()->count($numOfOrderProduct)->create();
    }
}
