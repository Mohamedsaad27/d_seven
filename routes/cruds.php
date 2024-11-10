<?php

use App\Http\Controllers\Website\ContactController;
use Illuminate\Support\Facades\Route;

Route::resource('contact',ContactController::class);
