<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = [
        "order_id",
        'user_id',
        "cart_id",
        "product_name",
        "product_price",
        "product_quantity",
        "product_size",
    ];
}