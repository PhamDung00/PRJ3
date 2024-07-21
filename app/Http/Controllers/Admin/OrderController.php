<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    protected $order;

    public function __construct(Order $order) {
        $this->order = $order;
    }
    public function index()
    {
        $orders =  $this->order->getWithPaginateBy(auth()->user()->id);
        return view('admin.orders.index', compact('orders'));
    }
    public function cancel($id)
    {
        $order =  $this->order->findOrFail($id);
        $order->update(['status' => 'cancel']);
        return redirect()->route('client.orders.index')->with(['message' => 'cancel success']);
    }
    public function show($id){
        $order = $this->order->findOrFail($id);
        $carts = $order->getCarts();
        $products = [];
        foreach ($carts[0]["products"] as $product) {
            $products[] = Product::find($product->product_id);
        }
        // return response()->json($products);
        return response()->view("admin.orders.detail", compact("order","carts","products"));
    }
}