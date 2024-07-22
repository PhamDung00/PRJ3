<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Models\Province;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('client.home');

Route::get('/product', [HomeController::class, 'products'])->name('productlist');

Route::get('product/{category_id}', [ClientProductController::class, 'index']) -> name('client.product.productlist');

Route::get('productdetail/{id}', [ClientProductController::class, 'show']) -> name('client.products.productdetail');

Route::middleware(['auth'])->group(function () {
    Route::post('add-to-cart',[CartController::class,'store'])->name('client.carts.add');
    Route::get('carts', [CartController::class, 'index'])->name('client.carts.index');
    Route::post('update-quantity-product-in-cart/{cart_product_id}', [CartController::class, 'updateQuantityProduct'])->name('client.carts.update_product_quantity');
    Route::delete('remove-product-in-cart/{cart_product_id}', [CartController::class, 'removeProductInCart'])->name('client.carts.remove_product');    
    Route::post('apply-coupon', [CartController::class, 'applyCoupon'])->name('client.carts.apply_coupon');
    Route::get('checkout', [CartController::class, 'checkout'])->name('client.checkout.index');
    Route::get('list-orders', [OrderController::class, 'index'])->name('client.orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('client.orders.orderdetail');
    Route::post('orders/cancel/{id}', [OrderController::class, 'cancel'])->name('client.orders.cancel');
    Route::resource("client-orders",OrderController::class);
    Route::get("/checkout-complete",[CartController::class, 'checkoutComplete'])->name("orders.complete");
    Route::get('/user', [UserController::class, 'index']);
    Route::get("/province-example", function () {
        $provinces = Province::where("type", "Parent")->get();
        return view("example.province", compact("provinces"));
    });
    Route::get('/district', [AddressController::class,'getDistricts'])->name('district');
    Route::get('/ward', [AddressController::class,'getWards'])->name('ward');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::prefix('roles')->controller(RoleController::class)->name('roles.')->group(function(){
        Route::get('/', 'index')->name('index')->middleware('role:super-admin');
        Route::post('/', 'store')->name('store')->middleware('role:super-admin');
        Route::get('/create', 'create')->name('create')->middleware('role:super-admin');
        Route::get('/{coupon}', 'show')->name('show')->middleware('role:super-admin');
        Route::put('/{coupon}', 'update')->name('update')->middleware('role:super-admin');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('role:super-admin');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('role:super-admin');
    });
    // Route::resource('users', UserController::class);
    Route::prefix('users')->controller(UserController::class)->name('users.')->group(function(){
        Route::get('/', 'index')->name('index')->middleware('permission:show-user');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-user');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-user');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-user');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-user');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-user');
    });
    // Route::resource('categories', CategoryController::class);
    Route::prefix('categories')->controller(CategoryController::class)->name('categories.')->group(function(){
        Route::get('/', 'index')->name('index')->middleware('permission:show-category');
        Route::post('/', 'store')->name('store')->middleware('permission:create-category');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-category');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-category');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-category');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-category');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-category');
    });

    // Route::resource('products', ProductController::class);

    Route::prefix('products')->controller(ProductController::class)->name('products.')->group(function(){
        Route::get('/', 'index')->name('index')->middleware('permission:show-product');
        Route::post('/', 'store')->name('store')->middleware('permission:create-product');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-product');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-product');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-product');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-product');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-product');
    });
    Route::prefix('coupons')->controller(CouponController::class)->name('coupons.')->group(function(){
            Route::get('/', 'index')->name('index')->middleware('permission:show-coupon');
            Route::post('/', 'store')->name('store')->middleware('permission:create-coupon');
            Route::get('/create', 'create')->name('create')->middleware('permission:create-coupon');
            Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-coupon');
            Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-coupon');
            Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-coupon');
            Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-coupon');
    });

    Route::resource("admin-orders",AdminOrderController::class);
    Route::get("order/history",[AdminOrderController::class,"history"])->name("orders.history");
    Route::get("order/show",[AdminOrderController::class,"show"])->name("orders.detail");
    Route::get('order', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::post('orders/cancel/{id}', [AdminOrderController::class, 'cancel'])->name('client.orders.cancel');
    Route::post('update-status/{id}', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.update_status');
});