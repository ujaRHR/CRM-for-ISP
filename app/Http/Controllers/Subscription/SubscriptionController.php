<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Customer;
use App\Models\Admin;
use App\Models\Plan;
use Exception;

class SubscriptionController extends Controller
{

    public function subscriptionPage(Request $request)
    {
        $admin = Admin::where('id', $request->header('id'))->first();

        return view('pages.admin.subscriptions', compact('admin'));
    }

    public function customerSubscriptionPage(Request $request)
    {
        $customer = Customer::where('id', $request->header('id'))->first();

        return view('pages.customer.subscriptions', compact('customer'));
    }

    public function customerSubscription(Request $request)
    {
        $subscription = Subscription::where('customer_id', $request->header('id'))
            ->with('plan', 'customer')
            ->first();

        return $subscription;
    }

    public function cancelSubscription(Request $request)
    {
        $cancelled = Subscription::where('id', $request->input('id'))
            ->update([
                'status' => 'inactive',
            ]);

        if ($cancelled) {
            return response()->json([
                'status'  => 'success',
                'message' => 'subscription cancelled successfully'
            ], 200);
        } else {
            return response()->json([
                'status'  => 'failed',
                'message' => 'failed to cancel the subscription'
            ]);
        }
    }

    public function checkoutPage(Request $request){
        $customer = Customer::where('id', $request->header('id'))->first();

        return view('pages.customer.checkout', compact('customer'));
    }

    public function subscriptionList(Request $request)
    {
        $subscriptions = Subscription::get();

        return $subscriptions;
    }

    public function getSubscriptionInfo(Request $request)
    {
        $id   = $request->input('id');
        $subscription = Subscription::where('id', $id)->first();

        return $subscription;
    }

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
        try {
            $subscription_id = $request->input('id');
            $deleted = Subscription::where('id', $subscription_id)->delete();

            if ($deleted) {
                return response()->json([
                    'status'  => 'success',
                    'message' => 'subscription deleted successfully'
                ], 200);
            } else {
                return response()->json([
                    'status'  => 'failed',
                    'message' => 'failed to delete the subscription!'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'failed to delete the subscription!'
            ]);
        }
    }

    public function updateSubscription(Request $request)
    {
        $id = $request->input('id');

        $updated = Plan::where('id', $id)->update([
            'name'          => $request->input('name'),
            'price'         => $request->input('price'),
            'billing_cycle' => $request->input('billing_cycle'),
            'speed'         => $request->input('speed')
        ]);

        if ($updated) {
            return response()->json([
                'status'  => 'success',
                'message' => 'plan updated successfully'
            ], 200);
        } else {
            return response()->json([
                'status'  => 'failed',
                'message' => 'failed to update the plan'
            ]);
        }
    }
}
