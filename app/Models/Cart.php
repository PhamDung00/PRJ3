<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        "status",
        "product_id"
    ] ;
    public function products()
    {
        return $this->hasMany(CartProduct::class, 'cart_id');
    }

    public static function getBy($userId)
    {
        return Cart::whereUserId($userId)->where("status","pending")->first();
    }

    public function firtOrCreateBy($userId, $productId = 0)
    {
        $cart = $this->getBy($userId);
        if (!$cart) {
            if ($productId == 0)
                $cart = [];
            else 
            $cart = Cart::create(['user_id' => $userId, "product_id"=>$productId,"status"=>"pending"]);
        }
        return $cart;
    }
    public function getProductCountAttribute()
    {
        return auth()->check() ? $this->products->count() : 0;
    }

    public function getTotalPriceAttribute()
    {
        return auth()->check() ? $this->products->reduce(function ($carry, $item) {
            $item->load('product');
            $price = $item->product_quantity * $item->product->price;
            return $carry + $price;
        }, 0) : 0;
    }
    
}