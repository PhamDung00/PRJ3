<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $category;

    public function __construct(Product $product, Category $category){
        $this->product = $product;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = $this->product->latest("id")->paginate(3);
        return response()->view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = $this->category->get(['id','name']);
        return response()->view('admin.products.create', compact('categories'));
    }
    private function addSizes(Request $request, $productDetail){
        $productDetail->sizes()->delete();
        foreach ($productDetail->sizes as $size) {
            Size::create([
                "product_detail_id" => $productDetail["id"],
                "name" => $size["name"],
                "quantity" => $size["quantity"]
            ]);
        }
    }
    private function createQuantity($request){
        $quantity = 0;
        $productDetails = $request->product_details;
        foreach ($productDetails as $value) {
            foreach($value["sizes"] as $sizes){
                $quantity += $sizes["quantity"];
            }
        }
        return $quantity;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productDetailsResponse = [];
        $product = Product::create(array_merge($request->all(), [
            "quantity" => self::createQuantity($request)
        ]));
        $productDetails = $request->product_details;
        foreach($productDetails as $detail){
            $productDetail = ProductDetail::create([
                "product_id" => $product->id
            ]);
            // merge detail with productDetail
            foreach ($detail as $key => $value) {
                $productDetail->setAttribute($key, $value);
            }
            self::addSizes($request, $productDetail);
        }
        // Upload images
        for ($i = 0; $i < 7; $i++) {
            if (isset($request["img_upload_" . $i])) {
                $imageName = self::uploadImage($request, "products", "img_upload_" . $i);
                Image::create([
                    "url" => $imageName,
                    "imageable_id" => $product->id,
                    "imageable_type" => "products"
                ]);
            }
        }
        return redirect(route("products.index"))->with("success", "Tạo thành công");
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
        $product = $this->product->findOrFail($id);
        $categories = Category::all();
        return response()->view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function updateProductDetail($productDetail){
        $productDetail->setAttribute("sizes", $productDetail->sizes);
        return $productDetail;
    }
    public function edit($id)
    {
        //
        $product = $this->product->findOrFail($id);
        $categories = Category::all();
        return response()->view('admin.products.edit', compact('product', "categories"));
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
        $product = Product::findOrFail($id);
        $product->update(array_merge($request->all(),[
            "quantity" => self::createQuantity($request)
        ]));
        // Xóa chi tiết sản phẩm cũ
        $product->details()->delete();
        $productDetails = $request->product_details;
        foreach($productDetails as $detail){
            $productDetail = ProductDetail::create([
                "product_id" => $product->id
            ]);
            // merge detail with productDetail
            foreach ($detail as $key => $value) {
                $productDetail->setAttribute($key, $value);
            }
            self::addSizes($request, $productDetail);
        }
        // Upload images
        for ($i = 0; $i < 7; $i++) {
            if (isset($request["img_upload_" . $i])) {
                $imageName = self::uploadImage($request, "products", "img_upload_" . $i);
                Image::create([
                    "url" => $imageName,
                    "imageable_id" => $product->id,
                    "imageable_type" => "products"
                ]);
            }
        }
        return response()->json(array_merge($request->all(),[
            "quantity" => self::createQuantity($request)
        ]), 200);
        // return redirect(route("products.index"))->with("success", "Cập nhật thành công");
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
        $product = $this->product->findOrFail($id);
        $product->delete();

        return redirect(route('products.index'))->with('success', 'Product deleted successfully');
    }
}