<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Helper\JWTToken;


class AdminController extends Controller
{
    public function createAdmin(Request $request)
    {
        try {
            Admin::create([
                'fullname' => $request->input('fullname'),
                'email'    => $request->input('email'),
                'phone'    => $request->input('phone'),
                'password' => Hash::make($request->input('password'))
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'admin created successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'something was wrong! try again...'
            ]);
        }
    }

    public function adminLogin(Request $request)
    {
        try {
            $email    = $request->input('email');
            $password = $request->input('password');

            $admin           = Admin::where('email', $email)->first();
            $user_id         = $admin->id;
            $hashed_password = $admin->password;

            if (Hash::check($password, $hashed_password)) {
                $user_email = $email;
                $token      = JWTToken::createToken($user_id, $user_email);

                return response()->json([
                    'status'  => 'success',
                    'message' => 'admin logged in successfully'
                ], 200)->cookie('token', $token, (24 * 60));
            }
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'admin login failed, unauthorized!'
            ]);
        }
    }

}