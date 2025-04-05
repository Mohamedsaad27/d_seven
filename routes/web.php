<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware([])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/cart.php';
require __DIR__.'/orders.php';
require __DIR__.'/cruds.php';
require __DIR__.'/product.php';

######################### Website Routes #########################

################################## Index Route #########################
Route::get('/', [HomeController::class, 'index'])->name('index');

################################## About Us Route #########################
Route::get('/about-us', function (){
    return view('website.about-us');
})->name('aboutUs');

################################## FAQ Route #########################
Route::get('/faq', function (){
    return view('website.faq');
})->name('faq');


################################## 404 Route #########################
Route::get('/404', function (){
    return view('website.404');
})->name('404');
