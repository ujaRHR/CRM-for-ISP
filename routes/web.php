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
use App\Http\Controllers\Users\AuthController;

Route::get('/', function () {
    return view('welcome');
});


// Test Routes 
Route::get('/test', [TestController::class, 'testFunc'])->middleware('token');

// Admin Routes
Route::get('/admin-signup', [AdminController::class, 'adminSignupPage']);
Route::post('/admin-signup', [AdminController::class, 'adminSignup']);
Route::get('/admin-dashboard', [DashboardController::class, 'dashboardPage'])->middleware(['token', 'admin']);


// Customer Routes
Route::get('/customer-dashboard', [CustomerController::class, 'customerDashboardPage'])->middleware(['token', 'customer']);
Route::get('/manage-customers', [CustomerController::class, 'customersPage'])->middleware(['token', 'admin']);
Route::post('/delete-customer', [CustomerController::class, 'deleteCustomer'])->middleware('token');
Route::post('/update-customer', [CustomerController::class, 'updateCustomer'])->middleware('token');
Route::get('/customer-list', [CustomerController::class, 'getCustomer'])->middleware(['token', 'admin']);
Route::post('/customer-info', [CustomerController::class, 'getCustomerInfo'])->middleware('token');
Route::post('/customer-profile', [CustomerController::class, 'customerProfileInfo'])->middleware('token');
Route::get('/customer-profile', [CustomerController::class, 'customerProfilePage'])->middleware(['token', 'customer']);


// User Authentication
Route::get('/user-login', [AuthController::class, 'userLoginPage'])->middleware('check');
Route::post('/customer-login', [AuthController::class, 'customerLogin']);
Route::get('/user-signup', [AuthController::class, 'userSignupPage'])->middleware('check');
Route::post('/customer-signup', [AuthController::class, 'customerSignup']);
Route::post('/admin-login', [AuthController::class, 'adminLogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/unauthorized', [AuthController::class, 'unauthorizedPage'])->middleware('token');


// Staff Routes
Route::get('/manage-staffs', [StaffController::class, 'staffsPage'])->middleware(['token', 'admin']);
Route::get('/staff-list', [StaffController::class, 'getStaff'])->middleware(['token', 'admin']);
Route::post('/staff-info', [StaffController::class, 'getStaffInfo'])->middleware(['token', 'admin']);
Route::post('/staff-signup', [StaffController::class, 'staffSignup'])->middleware(['token', 'admin']);
Route::post('/delete-staff', [StaffController::class, 'deleteStaff'])->middleware(['token', 'admin']);
Route::post('/update-staff', [StaffController::class, 'updateStaff'])->middleware(['token', 'admin']);


// Notices Routes
Route::get('/manage-notices', [NoticeController::class, 'noticePage'])->middleware(['token', 'admin']);
Route::post('/create-notice', [NoticeController::class, 'createNotice'])->middleware(['token', 'admin']);
Route::get('/notice-list', [NoticeController::class, 'noticeList'])->middleware('token');
Route::post('/notice-info', [NoticeController::class, 'getNoticeInfo'])->middleware('token');
Route::post('/delete-notice', [NoticeController::class, 'deleteNotice'])->middleware(['token', 'admin']);
Route::post('/update-notice', [NoticeController::class, 'updateNotice'])->middleware(['token', 'admin']);
Route::get('/customer-notices', [NoticeController::class, 'customerNoticesPage'])->middleware(['token', 'customer']);


// Plans Routes
Route::get('/manage-plans', [PlanController::class, 'planPage'])->middleware(['token', 'admin']);
Route::post('/create-plan', [PlanController::class, 'createPlan'])->middleware(['token', 'admin']);
Route::get('/plan-list', [PlanController::class, 'planList'])->middleware('token');
Route::post('/plan-info', [PlanController::class, 'getPlanInfo'])->middleware('token');
Route::post('/delete-plan', [PlanController::class, 'deletePlan'])->middleware(['token', 'admin']);
Route::post('/update-plan', [PlanController::class, 'updatePlan'])->middleware(['token', 'admin']);


// Subscriptions Routes
Route::get('/customer-subscriptions', [SubscriptionController::class, 'customerSubscriptionPage'])->middleware(['token', 'customer']);
Route::post('/customer-subscription', [SubscriptionController::class, 'customerSubscription'])->middleware('token');
Route::get('/manage-subscriptions', [SubscriptionController::class, 'subscriptionPage'])->middleware(['token', 'admin']);
Route::post('/update-status', [SubscriptionController::class, 'updateStatus'])->middleware('token');
Route::get('/all-subscriptions', [SubscriptionController::class, 'allSubscription'])->middleware(['token', 'admin']);
Route::post('/create-subscription', [SubscriptionController::class, 'createSubscription'])->middleware(['token', 'admin']);
Route::get('/subscription-list', [SubscriptionController::class, 'subscriptionList'])->middleware(['token', 'admin']);
Route::post('/subscription-info', [SubscriptionController::class, 'getSubscriptionInfo'])->middleware('token');
Route::post('/delete-subscription', [SubscriptionController::class, 'deleteSubscription'])->middleware(['token', 'admin']);
Route::post('/update-subscription', [SubscriptionController::class, 'updateSubscription'])->middleware(['token', 'admin']);
Route::get('/customer-checkout', [SubscriptionController::class, 'checkoutPage'])->middleware(['token', 'customer']);
Route::post('/create-order', [SubscriptionController::class, 'createOrder'])->middleware(['token', 'customer']);
Route::get('/customer-orders', [SubscriptionController::class, 'customerOrdersPage'])->middleware(['token', 'customer']);
Route::post('/customer-orders', [SubscriptionController::class, 'customerOrders'])->middleware('token');

// Tickets Routes
Route::get('/customer-tickets', [TicketController::class, 'customerTicketPage'])->middleware('token', 'customer');
Route::post('/create-ticket', [TicketController::class, 'createTicket'])->middleware(['token', 'customer']);

// Tasks Routes
Route::post('/create-task', [TaskController::class, 'createTask'])->middleware('token');
