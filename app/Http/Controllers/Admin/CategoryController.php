<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    protected $category;
    
    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function index()
    {
        //
        $categories = Category::latest('id')->paginate(3);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $parentCategories = $this->category->getParents();
        return view('admin.category.create', compact('parentCategories'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        //
        $dataCreate = $request->all();
        $category = $this->category->create($dataCreate);
        return redirect()->route('categories.index')->with(['message' => 'create new category:'.$category->name. 'success']);
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
        $parentCategories = $this->category->getParents();
        $category = $this->category->with('parent')->findOrFail($id);
        return view('admin.category.edit', compact('category','parentCategories'));
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
        $dateUpdate =$request->all();
        $category = $this->category->findOrFail($id);
        $category->update($dateUpdate);
        return redirect()->route('categories.index')->with(['message' => 'Update category: '.$category->name. 'success']);
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
        $category = $this->category->findOrFail($id);
        $category->delete();
        return to_route('categories.index')->with(['message'=> 'delete success']);
    }
}
