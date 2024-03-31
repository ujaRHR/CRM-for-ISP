<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// Admin
Route::post('/create-admin', [AdminController::class, 'createAdmin']);
Route::post('/admin-login', [AdminController::class, 'adminLogin']);