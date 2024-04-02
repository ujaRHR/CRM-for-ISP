<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
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

}