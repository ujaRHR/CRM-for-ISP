<?php

namespace App\Http\Controllers\Notices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Admin;
use Exception;

class NoticeController extends Controller
{

    public function noticePage(Request $request)
    {
        $admin_id = $request->header('id');
        $admin = Admin::find($admin_id);

        return view('pages.notices', compact('admin'));
    }

    public function noticeList(Request $request)
    {
        $notices = Notice::get();

        return $notices;
    }

    public function getNoticeInfo(Request $request)
    {
        $id   = $request->input('id');
        $notice = Notice::where('id', $id)->first();

        return $notice;
    }

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

            $deleted = Notice::where('admin_id', $admin_id)->where('id', $notice_id)->delete();

            if ($deleted) {
                return response()->json([
                    'status'  => 'success',
                    'message' => 'notice deleted successfully'
                ], 200);
            } else {
                return response()->json([
                    'status'  => 'failed',
                    'message' => 'failed to delete the notice!'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'failed to delete the notice!'
            ]);
        }
    }

    public function updateNotice(Request $request)
    {
        $id = $request->input('id');

        $updated = Notice::where('id', $id)->update([
            'title'          => $request->input('title'),
            'admin_id'       => $request->input('admin_id'),
            'description'    => $request->input('description')
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
