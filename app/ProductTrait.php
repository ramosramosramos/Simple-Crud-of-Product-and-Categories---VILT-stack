<?php

namespace App;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

trait ProductTrait
{
    public function getAllProducts(){
         return Product::query()
        ->with('category')
        ->select([
            'id',
            'category_id',
            'name',
            'description',
            'price',
            'stock',
        ])->latest()->get();
    }

    public function getProduct(Product $product,$category){
       return  [
            'name' => $product->name,
            'price' => $product->price,
            'stock' => $product->stock,
            'description' => $product->description,
            'category_name' => $category->name,
        ];
    }


    public function handleCreateProduct(StoreProductRequest $request,$category){
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'category_id' => $category->id,
        ]);
    }
    public function handleUpdateProduct(UpdateProductRequest $request,Product $product,$category){
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'category_id' => $category->id,
        ]);
    }
}
