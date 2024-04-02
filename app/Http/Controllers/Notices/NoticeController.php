<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function createNotice(Request $request)
    {
        try {
            $title       = $request->input('title');
            $description = $request->input('description');
            // $notice_img  = $request->input('');

            Notice::create([
                'title'       => $title,
                'description' => $description
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'notice created successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'something went wrong, try again...'
            ], 200);
        }
    }
}
