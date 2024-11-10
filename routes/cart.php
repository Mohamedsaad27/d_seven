<?php



use App\Http\Controllers\Website\CartController;
use Illuminate\Support\Facades\Route;

// Get Products From Cart
Route::get('/get-cart', [CartController::class, 'getCart'])->name('cart.index');

// Add Product To Cart
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.store');

// Remove Product From Cart
Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.delete');

// Clear Cart
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');

// Calc Total Of Cart
Route::get('/get-total', [CartController::class, 'getTotal'])->name('cart.total');

