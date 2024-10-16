<?php

namespace App\Http\Controllers\Products;

use App\CategoryTrait;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\ProductTrait;

class ProductController
{
    use CategoryTrait;
    use ProductTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->getAllProducts();
        return inertia('Product/Home', ['products' => ProductResource::collection($products)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->getCategories();
        return inertia('Product/Create', ['categories' => $categories]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $category = $this->getCategory_ID_WhereName($request->category_name);
        if (!$category || $category == null) {
            return back()->withErrors(['category_name' => 'Category not found!']);
        }
        $this->handleCreateProduct($request, $category);
        return redirect()->route('products.index')
            ->with("created", "Successfully added");

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = $this->getCategories();
        $category = $this->getCategory_Name_WhereID($product->category_id);
        $product = $this->getProduct($product, $category);
        return inertia('Product/Edit', [
            'categories' => $categories,
            'product' => $product,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $category = $this->getCategory_ID_WhereName($request->category_name);
        if (!$category || $category == null) {
            return back()->withErrors(['category_name' => 'Category not found!']);
        }
        $this->handleUpdateProduct($request,$product, $category);
        return redirect()->route('products.index')
            ->with("updated", "Successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with("deleted", "Successfully deleted");
    }
}
