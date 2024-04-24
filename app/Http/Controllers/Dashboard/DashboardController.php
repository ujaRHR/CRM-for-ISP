<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Admin;

class DashboardController extends Controller
{
    public function dashboardPage(Request $request)
    {
        $admin = Admin::where('id', $request->header('id'))->first();
        return view('dashboard')->with('admin', $admin);
    }

    public function customersPage(Request $request)
    {
        $admin     = Admin::where('id', $request->header('id'))->first();
        return view('pages.customers', compact('admin'));
    }

    public function getCustomer(){
        $customers = Customer::get();
        return $customers;
    }
}
