<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\Role;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    protected $user;
    protected $category;
    protected $order;
    protected $product;
    protected $coupon;
    protected $role;

    public function __construct(User $user, Category $category, Order $order, Product $product, Coupon $coupon, Role $role)
    {
        $this->user = $user;
        $this->category = $category;
        $this->order = $order;
        $this->product = $product;
        $this->coupon = $coupon;
        $this->role = $role;
    }

    public function index()
    {

        $userCount = $this->user->count();
        $categoryCount = $this->category->count();
        $orderCount = $this->order->count();
        $productCount = 0;
        $couponCount = $this->coupon->count();
        $roleCount = $this->role->count();
        $products = Product::all();
        foreach ($products as $product) {
            $productCount += $product->quantity;
        }
        $revenue = self::revenue();
        return view('admin.dashboard.index', compact('userCount', 'categoryCount', 'productCount', 'orderCount', 'couponCount', 'roleCount', "revenue"));
    }
}