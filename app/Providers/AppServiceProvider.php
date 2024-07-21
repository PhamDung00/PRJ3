<?php

namespace App\Providers;

use App\Composers\CartComposer;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    protected Cart $cart;
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer("*", function ($view) {
            $cartModel = new Cart();
            $cart = $cartModel->firtOrCreateBy(auth()->user()->id)->load('products');
            $productNames = [];
            foreach($cart->products as $product){
                $productNames[] = Product::find($product->product_id)["name"];
            }
            $categoryModel = new Category();
            $parentCategories = $categoryModel->getParents();
            $categories = [];
            foreach($parentCategories as $parentCategory){
                // TODO: get child categories
                $categories[] = [
                    "parent" => $parentCategory,
                    "childrens" => $parentCategory->childrens
                ];
            }
            $user = User::where("id", auth()->user()->id)->first();
                $histories = $user->histories; 
            $view->with(["GLOBAL_CART"=>$cart,"PRODUCT_CART"=> $productNames,"GLOBAL_CATEGORIES"=> $categories, "HISTORIES"=>$histories]);
        }
    );
    }
}