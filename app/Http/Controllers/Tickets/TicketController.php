<?php

namespace App\Http\Controllers\Tickets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function createTicket(Request $request)
    {
        $customer_id = $request->header('id');
        
    }
}
