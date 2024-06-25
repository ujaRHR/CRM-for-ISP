<?php

namespace App\Http\Controllers\Tickets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Exception;

class TicketController extends Controller
{

    public function customerTicketPage(){

        return "gdahdgs";
    }

    public function createTicket(Request $request)
    {
        try {
            $ticket = Ticket::create([
                'customer_id' => $request->header('id'),
                'title'       => $request->input('title'),
                'description' => $request->input('description')
            ]);

            if ($ticket) {
                return response()->json([
                    'status'  => 'success',
                    'message' => 'ticket created successfully'
                ], 200);
            } else {
                if ($ticket) {
                    return response()->json([
                        'status'  => 'failed',
                        'message' => 'failed to create a ticket'
                    ]);
                }
            }
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'failed to create a ticket'
            ]);
        }
    }
}
