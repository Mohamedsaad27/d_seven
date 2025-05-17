<?php

use App\Http\Controllers\Website\ProductController;
use App\Http\Controllers\Website\ReviewController;
use Illuminate\Support\Facades\Route;

Route::resource('/product', ProductController::class);

Route::post('get-products-by-category/{category_id}', [ProductController::class, 'getProductsByCategory'])->name('products.by.category');
Route::post('get-products-by-brand/{brand_id}', [ProductController::class, 'getProductsByBrand'])->name('products.by.brand');
Route::post('get-all-products', [ProductController::class, 'getAllProducts'])->name('products.all');
Route::post('search-products', [ProductController::class, 'searchProducts'])->name('products.search');


Route::resource('reviews', ReviewController::class);
