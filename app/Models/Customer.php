<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'customer_id',
        'customer_first_name',
        'customer_second_name',
        'customer_email',
        'customer_phone',
        'customer_firstline_address',
        'customer_secondline_address',
        'customer_postcode'
    ];
}
