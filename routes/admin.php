<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::view('dashboard', 'admin.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('categories',CategoryController::class);



