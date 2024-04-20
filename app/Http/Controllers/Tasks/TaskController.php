<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Exception;

class TaskController extends Controller
{
    public function createTask(Request $request)
    {
        try {
            $task = Task::create([
                'staff_id'    => $request->input('staff_id'),
                'admin_id'    => $request->header('id'),
                'ticket_id'   => $request->input('ticket_id'),
                'title'       => $request->input('title'),
                'description' => $request->input('description')
            ]);

            if ($task) {
                return response()->json([
                    'status'  => 'success',
                    'message' => 'task created successfully'
                ], 200);
            } else {
                return response()->json([
                    'status'  => 'failed',
                    'message' => 'failed to create new task'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'failed to create new task',
                'error' => $e
            ]);
        }
    }
}
