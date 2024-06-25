<?php

namespace App\Http\Controllers\Tickets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Customer;
use App\Models\Admin;
use Exception;

class TicketController extends Controller
{

    public function customerTicketPage(Request $request)
    {
        $customer = Customer::where('id', $request->header('id'))->first();

        return view('pages.customer.tickets', compact('customer'));
    }

    public function ticketPage(Request $request)
    {
        $admin = Admin::where('id', $request->header('id'))->first();

        return view('pages.admin.tickets', compact('admin'));
    }

    public function getCustomerTickets(Request $request)
    {
        $customer_id = $request->header('id');

        $tickets = Ticket::where('customer_id', $customer_id)->get();

        return $tickets;
    }

    public function getTickets()
    {
        $tickets = Ticket::with('customer')->get();

        return $tickets;
    }

    public function createTicket(Request $request)
    {
        try {
            $customer_id = $request->header('id');
            $date = date('md');
            $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

            $ticket = Ticket::create([
                'customer_id' => $customer_id,
                'ticket_id'   => "TKT-$date-$customer_id-$randomNumber",
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
                'message' => 'failed to create a ticket',
                'EEROR' => $e
            ]);
        }
    }

    public function updateTicket(Request $request)
    {
        $ticket_id = $request->input('ticket_id');
        $status = $request->input('status');

        $updated = Ticket::where('ticket_id', $ticket_id)->update([
            'status' => $status
        ]);
        if ($updated) {
            return response()->json([
                'status'  => 'success',
                'message' => 'ticket updated successfully'
            ], 200);
        } else {
            return response()->json([
                'status'  => 'failed',
                'message' => 'failed to update the ticket'
            ]);
        }
    }
}
