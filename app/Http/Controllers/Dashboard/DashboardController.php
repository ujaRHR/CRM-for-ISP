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
        $admin = Admin::where('id', $request->header('id'))->first();
        return view('pages.customers', compact('admin'));
    }

    public function getCustomer()
    {
        $customers = Customer::get();
        return $customers;
    }

    public function deleteCustomer(Request $request)
    {
        $pid = $request->input('pid');

        $deleted = Customer::where('personal_id', $pid)->delete();

        if ($deleted) {
            return response()->json([
                'status'  => 'success',
                'message' => 'customer deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'status'  => 'failed',
                'message' => 'failed to delete the customer'
            ]);
        }
    }
}
