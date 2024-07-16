<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
    ] ;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class,"product_detail_id");
    }

    public function colors()
    {
        return $this->hasMany(Color::class,"product_detail_id");
    }
}