<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'product_size',
        'product_quantity',
        'product_price'
    ] ;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function getBy($cartId, $productId, $productSize)
    {
        return CartProduct::whereCartId($cartId)->whereProductId($productId)->whereProductSize($productSize)->first();
    }
    public function images(){
        // return Image::where("imageable_id",$this->id)->where("imageable_type","products")->get();
        return $this->hasMany(Image::class, "imageable_id", "id")->where("imageable_type", "products");
    }

}
