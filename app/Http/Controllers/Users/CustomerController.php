<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Helper\JWTToken;


class CustomerController extends Controller
{
    public function customerDashboardPage(Request $request)
    {
        $customer = Customer::where('id', $request->header('id'))->first();
        return view('pages.customer.dashboard')->with('customer', $customer);
    }

    public function customersPage(Request $request)
    {
        $admin = Admin::where('id', $request->header('id'))->first();
        return view('pages.admin.customers', compact('admin'));
    }

    public function customerProfilePage(Request $request)
    {
        $customer = Customer::where('id', $request->header('id'))->first();

        return view('pages.customer.customer-profile', compact('customer'));
    }

    public function getCustomer()
    {
        $customers = Customer::get();
        return $customers;
    }

    public function getCustomerInfo(Request $request)
    {
        $pid = $request->input('pid');

        $customer = Customer::where('personal_id', $pid)->first();

        return $customer;
    }

    public function customerProfileInfo(Request $request)
    {
        $id = $request->header('id');

        $customer = Customer::where('id', $id)->first();

        return $customer;
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

    public function updateCustomer(Request $request)
    {
        $pid = $request->input('pid');

        $updated = Customer::where('personal_id', $pid)->update([
            'fullname' => $request->input('fullname'),
            'email'    => $request->input('email'),
            'phone'    => $request->input('phone'),
            'address'  => $request->input('address'),
            'password' => Hash::make($request->input('password'))
        ]);

        if ($updated) {
            return response()->json([
                'status'  => 'success',
                'message' => 'customer updated successfully'
            ], 200);
        } else {
            return response()->json([
                'status'  => 'failed',
                'message' => 'failed to update the customer'
            ]);
        }
    }
}
