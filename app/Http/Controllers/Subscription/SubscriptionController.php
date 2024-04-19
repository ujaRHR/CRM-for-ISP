<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Plan;
use Exception;

class SubscriptionController extends Controller
{
    public function createSubscription(Request $request)
    {
        try {
            // Subscription will be created by the customer only
            $plan_id = $request->input('plan_id');
            $plan    = Plan::where('id', $plan_id)->first();
            
            $new_subs = Subscription::create([
                'customer_id'       => $request->header('id'),
                'plan_id'           => $plan_id,
                'start_date'        => date('Y-m-d'),
                'next_billing_date' => date('Y-m-d', strtotime('+30 day')),
                'total_cost'        => $plan->price
            ]);

            if ($new_subs) {
                return response()->json([
                    'status'  => 'success',
                    'message' => 'subscription created successfully'
                ], 200);
            } else {
                return response()->json([
                    'status'  => 'failed',
                    'message' => 'failed to create a new subscription'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'failed to create a new subscription'
            ]);
        }
    }

    public function deleteSubscription(Request $request)
    {

    }
}
