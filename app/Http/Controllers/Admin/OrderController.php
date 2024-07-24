<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    protected $order;

    public function __construct(Order $order) {
        $this->order = $order;
    }
    public function index()
    {
        $orders =  $this->order->orderBy('id', 'desc')->paginate(10);
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
        return response()->json(compact('order','carts','products'));
        foreach ($carts[0]["products"] as $product) {
            $products[] = Product::find($product->product_id);
        }
        foreach($products as $index=>$product){
            // TODO: update images to product
            $products[$index]->setAttribute("images", $product->images);
        }
        // return response()->json($products);
        return response()->view("admin.orders.detail", compact("order","carts","products"));
    }
    public function updateStatus($id,Request $request)
    {
        $order =  Order::findOrFail($id);
        $order->update(['status' => $request->status]);
        // update product quantity
        $user = User::find($order->user_id);
        $carts = Cart::where('user_id', $user->id)->where("status","processing")->get();
        foreach($carts as $cart){
            $quantity = $cart->products[0]->product_quantity;
            $cart->update(["status"=> $request->status]);
            if($request->status =="Accept")
           { 
            // TODO: update product quantity if status is accept
                DB::update("UPDATE sizes SET quantity = GREATEST(0,quantity - {$quantity}) WHERE id = {$cart->products[0]->product_size}");
                DB::update("UPDATE products SET quantity = GREATEST(0,quantity - {$quantity}) WHERE id = {$cart->products[0]->product_id}");
            }
        }
        return  response()->json([
            'message' => 'success'
        ], 200);
    }

    // public function updateStatus($id, Request $request){
    //     $order = $this->order->findOrFail($id);
    //     $order->update($request->all());
    //     return redirect()->route('client.orders.index')->with(['message' => 'update success']);
    // }
}