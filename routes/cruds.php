<?php

use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ColorController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DiscountController;
use App\Http\Controllers\Dashboard\InventoryController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ShippingZoneController;
use App\Http\Controllers\Dashboard\SizeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Website\ContactController;
use Illuminate\Support\Facades\Route;

Route::resource('contact', ContactController::class);

Route::prefix('dashboard')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin');
    Route::resource('category', CategoryController::class)->middleware('admin');
    Route::resource('brand', BrandController::class)->middleware('admin');
    Route::resource('products', ProductController::class);  // No admin middleware if needed
    Route::resource('shipping_zone', ShippingZoneController::class)->middleware('admin');
    Route::resource('sizes', SizeController::class)->middleware('admin');
    Route::resource('colors', ColorController::class)->middleware('admin');
    Route::resource('orders', OrderController::class)->middleware('admin');
    Route::patch('orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.update-status')->middleware('admin');
    Route::post('orders/bulk-action', [OrderController::class, 'bulkAction'])->name('orders.bulk-action')->middleware('admin');
    Route::get('orders/export', [OrderController::class, 'export'])->name('orders.export')->middleware('admin');
    Route::post('orders/{order}/send-confirmation-email', [OrderController::class, 'sendConfirmationEmail'])->name('orders.send-confirmation-email')->middleware('admin');
    Route::resource('discounts', DiscountController::class)->middleware('admin');
    Route::get('discounts/assignProductsToDiscount', [DiscountController::class, 'assignProductsToDiscount'])->name('discounts.assignProductsToDiscount')->middleware('admin');
    Route::get('/discounts/{discount}/assigned-products', [DiscountController::class, 'getAssignedProducts'])->middleware('admin');
    Route::post('/discounts/assign-products', [DiscountController::class, 'assignProducts'])->name('discounts.assignProducts')->middleware('admin');
    Route::post('/discounts/remove-product', [DiscountController::class, 'removeProduct'])->name('discounts.removeProduct')->middleware('admin');
    Route::get('search-on-products', [DiscountController::class, 'searchOnProducts'])->name('discounts.searchOnProducts')->middleware('admin');
    Route::resource('inventory', InventoryController::class)->middleware('admin');
    Route::resource('users', UserController::class)->middleware('admin');
});
