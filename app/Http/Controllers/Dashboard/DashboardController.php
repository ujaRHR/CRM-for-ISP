<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Subscription;
use App\Models\Ticket;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function dashboardPage(Request $request)
    {
        $admin = Admin::where('id', $request->header('id'))->first();
        $orders = Order::count();

        $revenue = Subscription::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total_cost');

        $customers = Customer::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        $tickets = Ticket::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        $monthly_revenue = Subscription::selectRaw('SUM(total_cost) as total, MONTH(created_at) as month')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupByRaw('MONTH(created_at)')
            ->get();

        $revenue_data = [
            'labels' => $monthly_revenue->pluck('month')->map(function ($month) {
                return Carbon::create()->month($month)->format('M');
            }),
            'data' => $monthly_revenue->pluck('total')
        ];

        $monthly_customers = Customer::selectRaw('COUNT(id) as total, MONTH(created_at) as month')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupByRaw('MONTH(created_at)')
            ->get();

        $customer_data = [
            'labels' => $monthly_customers->pluck('month')->map(function ($month) {
                return Carbon::create()->month($month)->format('M');
            }),
            'data' => $monthly_customers->pluck('total')
        ];


        return view('pages.admin.dashboard', compact('admin', 'orders', 'revenue', 'customers', 'tickets', 'revenue_data', 'customer_data'));
    }
}
