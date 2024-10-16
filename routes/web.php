<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Products\ProductController;
use Illuminate\Support\Facades\Route;


Route::resource('products',ProductController::class);
Route::resource('categories',CategoryController::class);
