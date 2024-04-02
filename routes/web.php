<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AdminController;
use App\Http\Controllers\Users\CustomerController;
use App\Http\Controllers\Users\StaffController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::post('/admin-signup', [AdminController::class, 'adminSignup']);
Route::post('/admin-login', [AdminController::class, 'adminLogin']);

// User Routes
Route::post('/customer-signup', [CustomerController::class, 'customerSignup']);
Route::post('/customer-login', [CustomerController::class, 'customerLogin']);

// Staff Routes
Route::post('/staff-signup', [StaffController::class, 'staffSignup']);

// Notices Routes
Route::post('/create-notice', []);