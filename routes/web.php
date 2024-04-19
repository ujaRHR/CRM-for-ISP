<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AdminController;
use App\Http\Controllers\Users\CustomerController;
use App\Http\Controllers\Users\StaffController;
use App\Http\Controllers\Notices\NoticeController;
use App\Http\Controllers\Plans\PlanController;
use App\Http\Controllers\Subscription\SubscriptionController;
use App\Http\Controllers\Tickets\TicketController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::post('/admin-signup', [AdminController::class, 'adminSignup']);
Route::post('/admin-login', [AdminController::class, 'adminLogin']);

// User Routes
Route::post('/customer-signup', [CustomerController::class, 'customerSignup']);
Route::post('/customer-login', [CustomerController::class, 'customerLogin']);

Route::get('/logout', [AdminController::class, 'logout'])->middleware('token');

// Staff Routes
Route::post('/staff-signup', [StaffController::class, 'staffSignup']);

// Notices Routes
Route::post('/create-notice', [NoticeController::class, 'createNotice'])->middleware('token');
Route::post('/delete-notice', [NoticeController::class, 'deleteNotice'])->middleware('token');

// Plans Routes
Route::post('/create-plan', [PlanController::class, 'createPlan'])->middleware('token');
Route::post('/delete-plan', [PlanController::class, 'deletePlan'])->middleware('token');

// Subscriptions Routes
Route::post('/create-subscription', [SubscriptionController::class, 'createSubscription'])->middleware('token');

// Tickets Routes
Route: