<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // 'quantity',
        'product_detail_id'
    ];

    public function details()
    {
        return $this->belongsTo(ProductDetail::class);
    }
}