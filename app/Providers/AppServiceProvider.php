<?php

namespace App\Providers;

use App\Composers\CartComposer;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
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
                $cart = null;
                $productNames = [];
            if(auth()){
            $user = User::where("id", auth()->user()->id??auth()->id())->first();
            if($user)
            $cart = $cartModel->firtOrCreateBy($user->id);
            if($cart){
                $cart = $cart->load('products');
                foreach($cart->products as $product){
                    $productNames[] = Product::find($product->product_id)["name"];
                }}
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
            $view->with(["GLOBAL_CART"=>$cart,"PRODUCT_CART"=> $productNames,"GLOBAL_CATEGORIES"=> $categories]);
        }
    );
            Validator::extend('phone', function($attribute, $value, $parameters, $validator) {
                return preg_match('%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i', $value) && strlen($value) >= 10;
            });

            Validator::replacer('phone', function($message, $attribute, $rule, $parameters) {
                    return str_replace(':attribute',$attribute, ':attribute is invalid phone number');
                });
            }
}