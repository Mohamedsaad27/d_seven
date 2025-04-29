<?php

use App\Http\Controllers\Website\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('/product', ProductController::class);

Route::post('get-products-by-category/{category_id}', [ProductController::class, 'getProductsByCategory']);
Route::post('get-products-by-brand/{brand_id}', [ProductController::class, 'getProductsByBrand']);
Route::post('get-all-products', [ProductController::class, 'getAllProducts'])->name('products.all');
