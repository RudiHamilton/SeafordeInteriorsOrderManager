<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_id',
        'customer_id',
        'order_payment_type',
        'order_complete'
    ];
}
