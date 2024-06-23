<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
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


// Test Routes 
Route::get('/test', [TestController::class, 'testFunc'])->middleware('token');

// Admin Routes
Route::get('/admin-signup', [AdminController::class, 'adminSignupPage']);
Route::post('/admin-signup', [AdminController::class, 'adminSignup']);
Route::post('/admin-login', [AdminController::class, 'adminLogin']);
Route::get('/admin-login', [AdminController::class, 'adminLoginPage']);
Route::get('/admin-dashboard', [DashboardController::class, 'dashboardPage'])->middleware('token');


// Customer Routes
Route::get('/customer-dashboard', [CustomerController::class, 'customerDashboardPage'])->middleware('token');
Route::get('/manage-customers', [CustomerController::class, 'customersPage'])->middleware('token');
Route::post('/delete-customer', [CustomerController::class, 'deleteCustomer'])->middleware('token');
Route::post('/update-customer', [CustomerController::class, 'updateCustomer'])->middleware('token');
Route::post('/customer-signup', [CustomerController::class, 'customerSignup']);
Route::get('/customer-signup', [CustomerController::class, 'customerSignupPage']);
Route::post('/customer-login', [CustomerController::class, 'customerLogin']);
Route::get('/customer-login', [CustomerController::class, 'customerLoginPage']);
Route::get('/customer-list', [CustomerController::class, 'getCustomer'])->middleware('token');
Route::post('/customer-info', [CustomerController::class, 'getCustomerInfo'])->middleware('token');
Route::post('/customer-profile', [CustomerController::class, 'customerProfileInfo'])->middleware('token');
Route::get('/customer-profile', [CustomerController::class, 'customerProfilePage'])->middleware('token');

Route::get('/logout', [AdminController::class, 'logout']);

// Staff Routes
Route::get('/manage-staffs', [StaffController::class, 'staffsPage'])->middleware('token');
Route::get('/staff-list', [StaffController::class, 'getStaff'])->middleware('token');
Route::post('/staff-info', [StaffController::class, 'getStaffInfo'])->middleware('token');
Route::post('/staff-signup', [StaffController::class, 'staffSignup'])->middleware('token');
Route::post('/delete-staff', [StaffController::class, 'deleteStaff'])->middleware('token');
Route::post('/update-staff', [StaffController::class, 'updateStaff'])->middleware('token');


// Notices Routes
Route::get('/manage-notices', [NoticeController::class, 'noticePage'])->middleware('token');
Route::post('/create-notice', [NoticeController::class, 'createNotice'])->middleware('token');
Route::get('/notice-list', [NoticeController::class, 'noticeList'])->middleware('token');
Route::post('/notice-info', [NoticeController::class, 'getNoticeInfo'])->middleware('token');
Route::post('/delete-notice', [NoticeController::class, 'deleteNotice'])->middleware('token');
Route::post('/update-notice', [NoticeController::class, 'updateNotice'])->middleware('token');
Route::get('/customer-notices', [NoticeController::class, 'customerNoticesPage'])->middleware('token');
Route::post('/customer-notices', [NoticeController::class, 'customerNotices'])->middleware('token');


// Plans Routes
Route::get('/manage-plans', [PlanController::class, 'planPage'])->middleware('token');
Route::post('/create-plan', [PlanController::class, 'createPlan'])->middleware('token');
Route::get('/plan-list', [PlanController::class, 'planList'])->middleware('token');
Route::post('/plan-info', [PlanController::class, 'getPlanInfo'])->middleware('token');
Route::post('/delete-plan', [PlanController::class, 'deletePlan'])->middleware('token');
Route::post('/update-plan', [PlanController::class, 'updatePlan'])->middleware('token');


// Subscriptions Routes
Route::get('/customer-subscriptions', [SubscriptionController::class, 'customerSubscriptionPage'])->middleware('token');
Route::post('/customer-subscription', [SubscriptionController::class, 'customerSubscription'])->middleware('token');
Route::get('/manage-subscriptions', [SubscriptionController::class, 'subscriptionPage'])->middleware('token');
Route::post('/all-subscriptions', [SubscriptionController::class, 'allSubscription'])->middleware('token');
Route::post('/create-subscription', [SubscriptionController::class, 'createSubscription'])->middleware('token');
Route::post('/cancel-subscription', [SubscriptionController::class, 'cancelSubscription'])->middleware('token');
Route::get('/subscription-list', [SubscriptionController::class, 'subscriptionList'])->middleware('token');
Route::post('/subscription-info', [SubscriptionController::class, 'getSubscriptionInfo'])->middleware('token');
Route::post('/delete-subscription', [SubscriptionController::class, 'deleteSubscription'])->middleware('token');
Route::post('/update-subscription', [SubscriptionController::class, 'updateSubscription'])->middleware('token');
Route::get('/customer-checkout', [SubscriptionController::class, 'checkoutPage'])->middleware('token');
Route::post('/create-order', [SubscriptionController::class, 'createOrder'])->middleware('token');
Route::get('/customer-orders', [SubscriptionController::class, 'customerOrdersPage'])->middleware('token');
Route::post('/customer-orders', [SubscriptionController::class, 'customerOrders'])->middleware('token');

// Tickets Routes
Route::post('/create-ticket', [TicketController::class, 'createTicket'])->middleware('token');

// Tasks Routes
Route::post('/create-task', [TaskController::class, 'createTask'])->middleware('token');
