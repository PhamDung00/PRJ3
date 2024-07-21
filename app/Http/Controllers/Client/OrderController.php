<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\History;
use App\Models\Order;
use App\Models\Product;
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
        $order =  $this->order->find($id);
        // TODO: get 
        $product = Product::where("name", $order->history->product_name)->first();
        return response()->view('client.orders.orderdetail', compact('order',"product"));
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
        $carts = Cart::where("user_id", auth()->user()->id)->get();
        foreach ($carts as $cart) {
            // TODO: create history and remove cart
            foreach ($cart->products as $product) {
                // TODO: create history
            History::create([
                "order_id"=>$order->id,
                "cart_id" => $cart->id,
                "user_id" => auth()->user()->id,
                "product_name"=>$product->product_name,
                "product->quantity"=> $product->product_quantity,
                "product_price"=>$request->total,
                "product_size"=>$product->product_size
            ]);
        }
        $cart->delete();
        }
        return response()->redirectTo(route("orders.complete"));
    }
}