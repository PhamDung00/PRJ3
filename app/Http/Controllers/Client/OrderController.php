<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\History;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function show($id){
        $order = $this->order->findOrFail($id);
        $carts = $order->getCarts();
        $products = [];
        foreach ($carts[0]["products"] as $product) {
            $products[] = Product::find($product->product_id);
        }
        // return response()->json($products);
        return response()->view("client.orders.orderdetail", compact("order","carts","products"));
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
        foreach($carts as $cart){
            // TODO; update cart status and link it to order table
            $cart->update([
                "status"=>"processing"
            ]);
            DB::insert("INSERT INTO `order_carts` (`order_id`, `cart_id`) VALUES (?, ?)", [$order->id, $cart->id]);
        }
        return response()->redirectTo(route("orders.complete"))->with("cart",$carts);
    }
}