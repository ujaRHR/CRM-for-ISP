<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AdminController;
use App\Http\Controllers\Users\CustomerController;
use App\Http\Controllers\Users\StaffController;
use App\Http\Controllers\Notices\NoticeController;
use App\Http\Controllers\Plans\PlanController;
use App\Http\Controllers\Subscription\SubscriptionController;
use App\Http\Controllers\Tickets\TicketController;
use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::get('/admin-signup', [AdminController::class, 'adminSignupPage']);
Route::post('/admin-signup', [AdminController::class, 'adminSignup']);
Route::post('/admin-login', [AdminController::class, 'adminLogin']);
Route::get('/admin-login', [AdminController::class, 'adminLoginPage']);
Route::get('/admin-dashboard', [DashboardController::class, 'dashboardPage'])->middleware('token');
Route::get('/manage-customers', [DashboardController::class, 'customersPage'])->middleware('token');
Route::get('/customer-list', [DashboardController::class, 'getCustomer'])->middleware('token');
Route::post('/customer-delete', [DashboardController::class, 'deleteCustomer'])->middleware('token');
Route::post('/customer-update', [DashboardController::class, 'updateCustomer'])->middleware('token');
Route::post('/customer-info', [DashboardController::class, 'getCustomerInfo'])->middleware('token');
Route::get('/manage-plans', [PlanController::class, 'planPage'])->middleware('token');
Route::get('/plan-list', [PlanController::class, 'planList'])->middleware('token');

// User Routes
Route::post('/customer-signup', [CustomerController::class, 'customerSignup']);
Route::post('/customer-login', [CustomerController::class, 'customerLogin']);

Route::get('/logout', [AdminController::class, 'logout']);

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
Route::post('/create-ticket', [TicketController::class, 'createTicket'])->middleware('token');

// Tasks Routes
Route::post('/create-task', [TaskController::class, 'createTask'])->middleware('token');