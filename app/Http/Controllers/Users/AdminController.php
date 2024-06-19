<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Helper\JWTToken;


class AdminController extends Controller
{
    public function adminSignupPage()
    {
        return view('pages.admin.signup');
    }

    public function adminSignup(Request $request)
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

    public function adminLoginPage()
    {
        return view('pages.admin.login');
    }


    public function adminLogin(Request $request)
    {
        try {
            $email    = $request->input('email');
            $password = $request->input('password');

            $admin           = Admin::where('email', $email)->first();
            $admin_id        = $admin->id;
            $user_type       = 'admin';
            $hashed_password = $admin->password;

            if (Hash::check($password, $hashed_password)) {
                $admin_email = $email;
                $token       = JWTToken::createToken($admin_id, $admin_email, $user_type);

                return response()->json([
                    'status'  => 'success',
                    'message' => 'admin logged in successfully'
                ], 200)->cookie('token', $token, (24 * 60 * 60));
            } else {
                return response()->json([
                    'status'  => 'failed',
                    'message' => 'authentication failed, unauthorized!'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'authentication failed, unauthorized!'
            ]);
        }
    }

    public function logout(Request $request)
    {
        cookie()->forget('token');
        return redirect('/admin-login');
    }
}
