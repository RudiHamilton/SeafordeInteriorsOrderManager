<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    /** @use HasFactory<\Database\Factories\OrderProductFactory> */
    use HasFactory;
    protected $primaryKey = 'order_product_id';

    protected $fillable =[
        'order_product_id',
        'order_id',
        'product_id',
        'order_product_quantity',
    ];
}
