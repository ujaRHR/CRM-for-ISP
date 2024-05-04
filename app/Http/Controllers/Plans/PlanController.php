<?php

namespace App\Http\Controllers\Plans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Plan;
use Exception;

class PlanController extends Controller
{

    public function planPage(Request $request)
    {
        $admin = Admin::where('id', $request->header('id'))->first();

        return view('pages.plans', compact('admin'));
    }

    public function planList(Request $request)
    {
        $plans = Plan::get();

        return $plans;
    }

    public function getPlanInfo(Request $request)
    {
        $id   = $request->input('id');
        $plan = Plan::where('id', $id)->first();

        return $plan;
    }

    public function createPlan(Request $request)
    {
        try {
            Plan::create([
                'name'          => $request->input('name'),
                'price'         => $request->input('price'),
                'billing_cycle' => $request->input('billing_cycle'),
                'speed'         => $request->input('speed')
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'plan created successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'failed to create plan!',
                'error'   => $e
            ]);
        }
    }
    public function deletePlan(Request $request)
    {
        try {
            $plan_id = $request->input('id');
            $deleted = Plan::where('id', $plan_id)->delete();

            if ($deleted) {
                return response()->json([
                    'status'  => 'success',
                    'message' => 'plan deleted successfully'
                ], 200);
            } else {
                return response()->json([
                    'status'  => 'failed',
                    'message' => 'failed to delete the plan!'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'failed to delete the plan!'
            ]);
        }
    }

    public function updatePlan(Request $request)
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
