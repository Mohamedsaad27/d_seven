<?php

use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ColorController;
use App\Http\Controllers\Dashboard\DiscountController;
use App\Http\Controllers\Dashboard\InventoryController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ShippingZoneController;
use App\Http\Controllers\Dashboard\SizeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::resource('contact', ContactController::class);

Route::prefix('dashboard')->group(function () { 
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('category', CategoryController::class)->middleware('admin');
    Route::resource('brand', BrandController::class)->middleware('admin');
    Route::resource('products', ProductController::class)->middleware('admin');
    Route::resource('shipping_zone', ShippingZoneController::class)->middleware('admin');
    Route::resource('sizes', SizeController::class)->middleware('admin');
    Route::resource('colors', ColorController::class)->middleware('admin');
    Route::resource('orders', OrderController::class)->middleware('admin');
    Route::resource('discounts', DiscountController::class)->middleware('admin');
    Route::resource('inventory', InventoryController::class)->middleware('admin');
    Route::resource('users', UserController::class)->middleware('admin');
})->middleware('admin');
