<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use App\Helper\JWTToken;


class UserController extends Controller
{
    public function customerSignup(Request $request)
    {
        try {
            Customer::create([
                'fullname' => $request->input('fullname'),
                'email'    => $request->input('email'),
                'phone'    => $request->input('phone'),
                'password' => Hash::make($request->input('password'))
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
            $hashed_password = $customer->password;

            if (Hash::check($password, $hashed_password)) {
                $customer_email = $email;
                $token          = JWTToken::createToken($customer_id, $customer_email);

                return response()->json([
                    'status'  => 'success',
                    'message' => 'customer logged in successfully'
                ], 200)->cookie('token', $token, (24 * 60));
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

}