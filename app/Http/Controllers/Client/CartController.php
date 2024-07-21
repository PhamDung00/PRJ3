<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cart\CartResource;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Province;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $category;
    protected $cart;
    protected $product;
    protected $cartProduct;
    protected $coupon;
    protected $order;

    public function __construct(Category $category ,Product $product, Cart $cart, CartProduct $cartProduct, Coupon $coupon, Order $order)
    {
        $this->category = $category;
        $this->product = $product;
        $this->cart = $cart;
        $this->cartProduct = $cartProduct;
        $this->coupon = $coupon;
        $this->order = $order;
    }

    public function index()
    {
        //
        $parentCategories = $this->category->getParents();
        $categories = [];
        foreach($parentCategories as $parentCategory){
            // TODO: get child categories
            $categories[] = [
                "parent" => $parentCategory,
                "childrens" => $parentCategory->childrens
            ];
        }
        $cart = $this->cart->firtOrCreateBy(auth()->user()->id);
        if($cart){
            $cart = $cart->load('products');
        }
        return view('client.carts.index', compact('cart','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->product_size){
            
            $product = $this->product->findOrFail($request->product_id);
            $cart = $this->cart->firtOrCreateBy(auth()->user()->id, $request->product_id);
            $cartProduct = $this->cartProduct->getBy($cart->id, $product->id, $request->product_size);
            if($cartProduct){
                $quantity = $cartProduct->product_quantity;
                $cartProduct->update(['product_quantity' => ($quantity + $request->product_quantity)]);
            } else {
                $dataCreate['cart_id'] = $cart->id;
                $dataCreate['product_size'] = $request->product_size;
                $dataCreate['product_quantity'] = $request->quantity ?? 1;
                $dataCreate['product_price'] = $product->price;
                $dataCreate['product_id'] = $request->product_id;
                $dataCreate["status"] = "pending";
                $this->cartProduct->create($dataCreate);
            }
            return back()->with(['message' => 'Add success']);
        } else {
            return back()->with(['message' => 'You have not chosen a size yet']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function removeProductInCart($id)
    {
         $cartProduct =  $this->cartProduct->find($id);
         $cartProduct->delete();
         $cart =  $cartProduct->cart;
         return response()->json([
             'product_cart_id' => $id,
             'cart' => new CartResource($cart)
         ], Response::HTTP_OK);
    }
    public function updateQuantityProduct(Request $request, $id)
    {
         $cartProduct =  $this->cartProduct->find($id);
         $dataUpdate = $request->all();
         if($dataUpdate['product_quantity'] < 1 ) {
            $cartProduct->delete();
        } else {
            $cartProduct->update($dataUpdate);
        }

        $cart =  $cartProduct->cart;

        return response()->json([
            'product_cart_id' => $id,
            'cart' => new CartResource($cart),
            'remove_product' => $dataUpdate['product_quantity'] < 1,
            'cart_product_price' => $cartProduct->total_price
        ], Response::HTTP_OK);
    }
    public function applyCoupon(Request $request)
    {

        $name = $request->input('coupon_code');

        $coupon =  $this->coupon->firstWithExperyDate($name, auth()->user()->id);

        if($coupon)
        {
            $message = 'Apply discount code successfully!';
            Session::put('coupon_id', $coupon->id);
            Session::put('discount_amount_price', $coupon->value);
            Session::put('coupon_code' , $coupon->name);
        }else{

            Session::forget(['coupon_id', 'discount_amount_price', 'coupon_code']);
            $message = 'Discount code does not exist or has expired!';
        }
        return redirect()->route('client.carts.index')->with([
            'message' => $message,
        ]);
    }
    public function checkout()
    {
        $parentCategories = $this->category->getParents();
        $categories = [];
        foreach($parentCategories as $parentCategory){
            // TODO: get child categories
            $categories[] = [
                "parent" => $parentCategory,
                "childrens" => $parentCategory->childrens
            ];
        }
        $carts = $this->cart->firtOrCreateBy(auth()->user()->id);
        $productNames = [];
        if($carts) {$carts = $carts->load('products');
        foreach($carts->products as $product){
            $productNames[] = Product::find($product->product_id)["name"];
        }}
        $provinces = Province::where("province_at", null)->get();
        return view('client.carts.checkout', compact('carts', 'categories', "provinces", "productNames"));
    }
    public function checkoutComplete() {
        $parentCategories = $this->category->getParents();
        $categories = [];
        foreach($parentCategories as $parentCategory){
            // TODO: get child categories
            $categories[] = [
                "parent" => $parentCategory,
                "childrens" => $parentCategory->childrens
            ];
        }
        $carts = $this->cart->firtOrCreateBy(auth()->user()->id);
        if ($carts) {
            $carts = $carts->load("products");
        }
        $productNames = [];
        if(isset($carts->products))
        {        
            foreach($carts->products as $product){
                $productNames[] = Product::find($product->product_id)["name"];
            }
        }        
        $rawOrder = DB::select("SELECT * FROM orders WHERE id = (SELECT MAX(id) FROM orders)");
        $order = Order::hydrate($rawOrder)[0];
        return view("client.carts.checkoutcomplete",compact("categories","order","carts","productNames"));
    }
}