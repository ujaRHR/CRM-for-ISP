<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Helper\JWTToken;
use Exception;
use Illuminate\Support\Facades\Cookie;


class AuthController extends Controller
{
    public function userLoginPage()
    {
        return view('pages.user-login');
    }

    public function userSignupPage()
    {
        return view('pages.user-signup');
    }

    public function unauthorizedPage(){
        return view('pages.unauthorized');
    }

    public function customerSignup(Request $request)
    {
        try {
            Customer::create([
                'fullname'    => $request->input('fullname'),
                'email'       => $request->input('email'),
                'phone'       => $request->input('phone'),
                'personal_id' => rand(1000001, 9999999),
                'password'    => Hash::make($request->input('password'))
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'customer created successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'something was wrong! try again...'
            ]);
        }
    }

    public function customerLogin(Request $request)
    {
        try {
            $email    = $request->input('email');
            $password = $request->input('password');

            $customer        = Customer::where('email', $email)->first();
            $customer_id     = $customer->id;
            $user_type       = 'customer';
            $hashed_password = $customer->password;

            if (Hash::check($password, $hashed_password)) {
                $customer_email = $email;
                $fullname = $customer->fullname;
                $token          = JWTToken::createToken($customer_id, $customer_email, $user_type, $fullname);

                return response()->json([
                    'status'  => 'success',
                    'message' => 'customer logged in successfully'
                ], 200)->cookie('token', $token, (24 * 60 * 60));
            } else {
                return response()->json([
                    'status'  => 'failed',
                    'message' => 'authentication failed, unauthorized!'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'authentication failed, unauthorized!'
            ]);
        }
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
                $fullname = $admin->fullname;
                $token       = JWTToken::createToken($admin_id, $admin_email, $user_type, $fullname);

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
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'authentication failed, unauthorized!'
            ]);
        }
    }

    public function logout()
    {
        $cookie = Cookie::forget('token');
        return redirect('/user-login')->withCookie($cookie);
    }
}
