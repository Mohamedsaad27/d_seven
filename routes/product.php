<?php

use App\Http\Controllers\Website\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('/product', ProductController::class);

