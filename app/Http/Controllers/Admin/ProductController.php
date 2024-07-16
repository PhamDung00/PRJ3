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
        return view('admin.products.index', compact('products'));
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
        return view('admin.products.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function addSizes(Request $request, $productDetail){
        $oldSizes = $productDetail->sizes;
        foreach($oldSizes as $size){
            $size->delete();
        }
        $countSizes = 0;
        $name = "product_details[0][sizes][".$countSizes."][name]";
        while($request->input($name)){
            Color::create([
                "name" => $request->input($name),
                "product_detail_id" => $productDetail->id
            ]);
            $countSizes++;
            $name = "product_details[0][sizes][".$countSizes."][name]";
        }
    }
    private function addColors(Request $request, $productDetail){
        $oldColors = $productDetail->colors;
        foreach($oldColors as $color){
            $color->delete();
        }
        $countColors = 0;
        $name = "product_details[0][colors][".$countColors."][name]";
        while($request->input($name)){
            Color::create([
                "name" => $request->input($name),
                "product_detail_id" => $productDetail->id
            ]);
            $countColors++;
            $name = "product_details[0][colors][".$countColors."][name]";
        }
    }
    public function store(Request $request)
    {
        $productDetailsResponse = [];
        $product = Product::create($request->all());

        $detail = ProductDetail::create([
            "product_id" => $product->id,
            "quantity" => $request->quantity
        ]);
        self::addSizes($request, $detail);
        self::addColors($request, $detail);
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
        return view('admin.products.show', compact('product'));
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
        return view('admin.products.edit', compact('product', "categories"));
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
        $product->update($request->all());
        // Xóa chi tiết sản phẩm cũ
        $productDetail = $product->productDetail;
        $productDetail->update([
            'quantity' => $request->quantity,
        ]);
        self::addSizes($request, $productDetail);
        self::addColors($request, $productDetail);
        // Upload hình ảnh
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

        return redirect(route("products.index"))->with("success", "Cập nhật thành công");
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