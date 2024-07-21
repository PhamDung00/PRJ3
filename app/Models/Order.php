<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'total',
        'ship',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'note',
        "user_id"
    ] ;
    public function getWithPaginateBy($userId)
    {
        return $this->whereUserId($userId)->latest('id')->paginate(10);
    }
    public function history(){
        return $this->hasOne(History::class,'order_id');
    }
    public function getCarts(){
        $rawCarts = DB::select("SELECT c.* FROM (carts as c JOIN order_carts as o_c ON c.id = o_c.cart_id) JOIN orders ON orders.id = o_c.order_id WHERE orders.id = {$this->id};");
        $carts = Cart::hydrate($rawCarts);
        return $carts;
    }
}