<?php

use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ColorController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ShippingZoneController;
use App\Http\Controllers\Dashboard\SizeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\DiscountController;
use App\Http\Controllers\Dashboard\InventoryController;


use Illuminate\Support\Facades\Route;

Route::resource('contact', ContactController::class);

Route::prefix('dashboard')->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('products', ProductController::class);
    Route::resource('shipping_zone', ShippingZoneController::class);
    Route::resource('sizes', SizeController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('discounts', DiscountController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('users', UserController::class);
});
