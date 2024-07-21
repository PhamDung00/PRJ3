<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    protected $order;
    protected $cart;
    
    public function __construct(Order $order,Cart $cart)
    {
        $this->order = $order;
        $this->cart = $cart;
    }
    public function index()
    {
        $orders =  $this->order->getWithPaginateBy(auth()->user()->id);
        return view('client.orders.index', compact('orders'));
    }

    public function cancel($id)
    {
        $order =  $this->order->findOrFail($id);
        $order->update(['status' => 'cancel']);
        return redirect()->route('client.orders.index')->with(['message' => 'cancel success']);
    }
    public function show($id)
    {
        //
        $orders =  $this->order->getWithPaginateBy(auth()->user()->id);
        return response()->view('client.orders.show', compact('orders'));
    }
    public function store(Request $request){
        $request->validate([
            "customer_name"=>"required",
            "customer_email"=>"required|email",
        ]);
        $address = "{$request['address-ward']}, {$request['address-district']}, {$request['address']}";
        $order = $this->order->create(array_merge($request->all(),[
            "customer_address"=>$address
        ]));
        // remove cart after convert it to order record
        Cart::where("user_id", auth()->user()->id)->delete();
        return response()->redirectTo(route("orders.complete"));
    }
}