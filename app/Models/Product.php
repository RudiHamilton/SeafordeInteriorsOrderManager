<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $primaryKey = 'product_id';

    protected $fillable =[
        'product_id',
        'product_name',
        'product_price',
        'product_cost_to_make',
        'product_current_stock',
    ];
    public function reduceStock($quantity)
    {
        if ($this->stock_quantity < $quantity) {
            throw new \Exception("Not enough stock available.");
        }
        $this->decrement('stock_quantity', $quantity);
    }
}
