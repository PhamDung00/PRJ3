<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $category;
    protected $product;
    public function __construct(Category $category, Product $product){
        $this->category = $category;
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category_id)
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
        $products = Product::join('category_prd as c_p', 'products.id', '=', 'c_p.product_id')
                        ->join('categories as c', 'c_p.category_id', '=', 'c.id')
                        ->where('c.id', $category_id)
                        ->orWhere('c.parent_id', $category_id)
                        ->select('products.*')
                        ->paginate(2); // số sản phẩm trên mỗi trang
        return response()->view("client.products.productlist", compact("products", "categories"));
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
        $parentCategories = $this->category->getParents();
        $categories = [];
        foreach($parentCategories as $parentCategory){
            // TODO: get child categories
            $categories[] = [
                "parent" => $parentCategory,
                "childrens" => $parentCategory->childrens
            ];
        }
        $product = $this->product->with('details')->findOrFail($id);
        return view('client.products.productdetail', compact("product",'categories'));
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
}