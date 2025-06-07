<?php

use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('admin')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/cart.php';
require __DIR__ . '/cruds.php';
require __DIR__ . '/product.php';

// ######################## Website Routes #########################

// ################################# Index Route #########################
Route::get('/', [HomeController::class, 'index'])->name('index');

// ################################# About Us Route #########################
Route::get('/about-us', function () {
    return view('website.about-us');
})->name('aboutUs');

// ################################# FAQ Route #########################
Route::get('/faq', function () {
    return view('website.faq');
})->name('faq');

// ################################# 404 Route #########################
Route::get('/404', function () {
    return view('website.404');
})->name('404');

// ################################# My Account Route #########################
Route::get('/my-account', function () {
    return view('website.my_account');
})->name('myAccount');

// ################################# CSRF Token Route #########################
Route::get('/csrf-token', function () {
    return response()->json([
        'csrf_token' => csrf_token()
    ]);
})->name('csrf.token');
