<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    //

    public function index(){

        $tickets = Ticket::orderByDesc('created_at')->paginate(5);
    
        $auth = Auth::user();
    
        $countTicket = Ticket::count();
    
        return view('admin.tickets.index', compact('tickets', 'auth','countTicket'));
    
       }
}
