<?php

use App\Http\Controllers\Website\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/get-cart', [CartController::class, 'getCart'])->name('cart.index');

Route::post('/add-to-cart/{product_id}', [CartController::class, 'addToCart'])->name('cart.store');

Route::get('/remove-from-cart/{cart_item_id}', [CartController::class, 'removeFromCart'])->name('cart.delete');

Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');

Route::get('/get-total', [CartController::class, 'getTotal'])->name('cart.total');
