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
Route::get('/manage-customers', [CustomerController::class, 'customersPage'])->middleware('token');
Route::get('/customer-list', [CustomerController::class, 'getCustomer'])->middleware('token');
Route::post('/delete-customer', [CustomerController::class, 'deleteCustomer'])->middleware('token');
Route::post('/update-customer', [CustomerController::class, 'updateCustomer'])->middleware('token');
Route::post('/customer-info', [CustomerController::class, 'getCustomerInfo'])->middleware('token');


// User Routes
Route::post('/customer-signup', [CustomerController::class, 'customerSignup']);
Route::post('/customer-login', [CustomerController::class, 'customerLogin']);

Route::get('/logout', [AdminController::class, 'logout']);

// Staff Routes
Route::get('/manage-staffs', [StaffController::class, 'staffsPage'])->middleware('token');
Route::get('/staff-list', [StaffController::class, 'getStaff'])->middleware('token');
Route::post('/staff-info', [StaffController::class, 'getStaffInfo'])->middleware('token');
Route::post('/staff-signup', [StaffController::class, 'staffSignup'])->middleware('token');
Route::post('/delete-staff', [StaffController::class, 'deleteStaff'])->middleware('token');
Route::post('/update-staff', [StaffController::class, 'updateStaff'])->middleware('token');


// Notices Routes
Route::post('/create-notice', [NoticeController::class, 'createNotice'])->middleware('token');
Route::post('/delete-notice', [NoticeController::class, 'deleteNotice'])->middleware('token');

// Plans Routes
Route::get('/manage-plans', [PlanController::class, 'planPage'])->middleware('token');
Route::post('/create-plan', [PlanController::class, 'createPlan'])->middleware('token');
Route::get('/plan-list', [PlanController::class, 'planList'])->middleware('token');
Route::post('/plan-info', [PlanController::class, 'getPlanInfo'])->middleware('token');
Route::post('/delete-plan', [PlanController::class, 'deletePlan'])->middleware('token');
Route::post('/update-plan', [PlanController::class, 'updatePlan'])->middleware('token');


// Subscriptions Routes
Route::post('/create-subscription', [SubscriptionController::class, 'createSubscription'])->middleware('token');

// Tickets Routes
Route::post('/create-ticket', [TicketController::class, 'createTicket'])->middleware('token');

// Tasks Routes
Route::post('/create-task', [TaskController::class, 'createTask'])->middleware('token');