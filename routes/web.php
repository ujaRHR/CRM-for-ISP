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


// Homepage - Welcome Page
Route::get('/', function () {
    return view('welcome');
});


// Admin Routes
Route::get('/admin-signup', [AdminController::class, 'adminSignupPage']);
Route::post('/admin-signup', [AdminController::class, 'adminSignup']);
Route::post('/customer-login', [AuthController::class, 'customerLogin']);
Route::post('/customer-signup', [AuthController::class, 'userSignup']);
Route::post('/admin-login', [AuthController::class, 'adminLogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/test', [TestController::class, 'testFunc']);


// auth and admin middleware
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'dashboardPage']);
    Route::get('/manage-customers', [CustomerController::class, 'customersPage']);
    Route::get('/customer-list', [CustomerController::class, 'getCustomer']);
    Route::post('/delete-customer', [CustomerController::class, 'deleteCustomer']);
    Route::post('/update-customer', [CustomerController::class, 'updateCustomer']);
    Route::get('/manage-staffs', [StaffController::class, 'staffsPage']);
    Route::get('/staff-list', [StaffController::class, 'getStaff']);
    Route::post('/staff-info', [StaffController::class, 'getStaffInfo']);
    Route::post('/staff-signup', [StaffController::class, 'staffSignup']);
    Route::post('/delete-staff', [StaffController::class, 'deleteStaff']);
    Route::post('/update-staff', [StaffController::class, 'updateStaff']);
    Route::get('/manage-notices', [NoticeController::class, 'noticePage']);
    Route::post('/create-notice', [NoticeController::class, 'createNotice']);
    Route::post('/delete-notice', [NoticeController::class, 'deleteNotice']);
    Route::post('/update-notice', [NoticeController::class, 'updateNotice']);
    Route::get('/manage-plans', [PlanController::class, 'planPage']);
    Route::post('/create-plan', [PlanController::class, 'createPlan']);
    Route::post('/delete-plan', [PlanController::class, 'deletePlan']);
    Route::post('/update-plan', [PlanController::class, 'updatePlan']);
    Route::get('/manage-subscriptions', [SubscriptionController::class, 'subscriptionPage']);
    Route::get('/all-subscriptions', [SubscriptionController::class, 'allSubscription']);
    Route::post('/create-subscription', [SubscriptionController::class, 'createSubscription']);
    Route::get('/subscription-list', [SubscriptionController::class, 'subscriptionList']);
    Route::post('/delete-subscription', [SubscriptionController::class, 'deleteSubscription']);
    Route::post('/update-subscription', [SubscriptionController::class, 'updateSubscription']);
    Route::get('/manage-tickets', [TicketController::class, 'ticketPage']);
    Route::get('/ticket-list', [TicketController::class, 'getTickets']);
    Route::post('/update-ticket', [TicketController::class, 'updateTicket']);
});


// auth and customer middleware
Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/customer-dashboard', [CustomerController::class, 'customerDashboardPage']);
    Route::get('/customer-profile', [CustomerController::class, 'customerProfilePage']);
    Route::get('/customer-notices', [NoticeController::class, 'customerNoticesPage']);
    Route::get('/customer-checkout', [SubscriptionController::class, 'checkoutPage']);
    Route::post('/create-order', [SubscriptionController::class, 'createOrder']);
    Route::get('/customer-orders', [SubscriptionController::class, 'customerOrdersPage']);
    Route::get('/customer-subscriptions', [SubscriptionController::class, 'customerSubscriptionPage']);
    Route::post('/customer-ticket-list', [TicketController::class, 'getCustomerTickets']);
    Route::post('/create-ticket', [TicketController::class, 'createTicket']);
    Route::get('/customer-tickets', [TicketController::class, 'customerTicketPage']);
});


// just the auth middleware
Route::middleware('auth')->group(function () {
    Route::get('/unauthorized', [AuthController::class, 'unauthorizedPage']);
    Route::post('/customer-info', [CustomerController::class, 'getCustomerInfo']);
    Route::post('/customer-profile', [CustomerController::class, 'customerProfileInfo']);
    Route::get('/notice-list', [NoticeController::class, 'noticeList']);
    Route::post('/notice-info', [NoticeController::class, 'getNoticeInfo']);
    Route::get('/plan-list', [PlanController::class, 'planList']);
    Route::post('/plan-info', [PlanController::class, 'getPlanInfo']);
    Route::post('/customer-subscription', [SubscriptionController::class, 'customerSubscription']);
    Route::post('/update-status', [SubscriptionController::class, 'updateStatus']);
    Route::post('/subscription-info', [SubscriptionController::class, 'getSubscriptionInfo']);
    Route::post('/customer-orders', [SubscriptionController::class, 'customerOrders']);
    Route::post('/create-task', [TaskController::class, 'createTask']);
});


// 'check' middleware
Route::middleware('check')->group(function () {
    Route::get('/user-login', [AuthController::class, 'userLoginPage']);
    Route::get('/user-signup', [AuthController::class, 'userSignupPage']);
    Route::get('/user-signup', [AuthController::class, 'userSignupPage']);
    Route::post('/user-signup', [AuthController::class, 'userSignup']);
    Route::get('/reset-password', [AuthController::class, 'passwordResetPage']);
    Route::post('/send-otp', [AuthController::class, 'sendOTP']);
    Route::get('/change-password', [AuthController::class, 'changePasswordPage']);
    Route::post('/change-password', [AuthController::class, 'changePassword']);
});


// check and reset-pass middleware
Route::middleware(['check', 'reset-pass'])->group(function () {
    Route::get('/verify-otp', [AuthController::class, 'verifyOTPPage']);
    Route::post('/verify-otp', [AuthController::class, 'verifyOTP']);
});
