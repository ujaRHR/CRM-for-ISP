<?php

namespace App\Http\Controllers\Notices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use Exception;

class NoticeController extends Controller
{
    public function createNotice(Request $request)
    {
        $admin_id = $request->header('id');

        try {
            $title       = $request->input('title');
            $description = $request->input('description');
            // $notice_img  = $request->input('');

            Notice::create([
                'admin_id'    => $admin_id,
                'title'       => $title,
                'description' => $description
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'notice created successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'something went wrong, try again...'
            ]);
        }
    }

    public function deleteNotice(Request $request)
    {
        $admin_id = $request->header('id');

        try {
            $notice_id = $request->input('id');

            Notice::where('admin_id', $admin_id)->where('id', $notice_id)->delete();

            return response()->json([
                'status'  => 'success',
                'message' => 'notice deleted successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'failed to delete notice!'
            ]);
        }
    }
}
