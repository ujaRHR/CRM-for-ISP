<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Helper\JWTToken;


class StaffController extends Controller
{
    public function staffSignup(Request $request)
    {
        try {
            Staff::create([
                'fullname' => $request->input('fullname'),
                'email'    => $request->input('email'),
                'phone'    => $request->input('phone'),
                'position' => $request->input('position'),
                'salary'   => $request->input('salary')
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'staff created successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'something was wrong! try again...',
            ]);
        }
    }

    public function staffsPage(Request $request)
    {
        $admin = Admin::where('id', $request->header('id'))->first();
        return view('pages.staffs', compact('admin'));
    }

    public function getStaff()
    {
        $staffs = Staff::get();
        return $staffs;
    }

    public function getStaffInfo(Request $request)
    {
        $pid = $request->input('pid');

        $staff = Staff::where('personal_id', $pid)->first();

        return $staff;
    }

    public function deleteStaff(Request $request)
    {
        $pid = $request->input('pid');

        $deleted = Staff::where('personal_id', $pid)->delete();

        if ($deleted) {
            return response()->json([
                'status'  => 'success',
                'message' => 'staff deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'status'  => 'failed',
                'message' => 'failed to delete the staff'
            ]);
        }
    }

    public function updateStaff(Request $request)
    {
        $pid = $request->input('pid');

        $updated = Staff::where('personal_id', $pid)->update([
            'fullname' => $request->input('fullname'),
            'email'    => $request->input('email'),
            'phone'    => $request->input('phone'),
            'password' => Hash::make($request->input('password'))
        ]);

        if ($updated) {
            return response()->json([
                'status'  => 'success',
                'message' => 'staff updated successfully'
            ], 200);
        } else {
            return response()->json([
                'status'  => 'failed',
                'message' => 'failed to update the staff'
            ]);
        }
    }

}