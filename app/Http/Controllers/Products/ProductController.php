<?php

namespace App\Http\Controllers\Products;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;

class ProductController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()
        ->with('category')
        ->select([
            'id',
            'category_id',
            'name',
            'description',
            'price',
            'stock',
        ])->latest()->get();
        return inertia('User/Home',['products'=>ProductResource::collection($products)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select(['name'])->get();
        return inertia('User/Create',['categories'=>$categories]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $category = Category::query()
        ->select(['id'])->where('name','like','%'.$request->category_name.'%')->first();
        if(!$category || $category==null){
            return back()->withErrors(['category_name'=>'Category not found!']);
        }
        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'description'=>$request->description,
            'category_id'=>$category->id,
        ]);

        return redirect()->route('products.index')
        ->with("created","Successfully added");

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with("deleted","Successfully deleted");
    }
}
