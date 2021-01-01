<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;

class TicketsController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->user()->id)->get();
        return view('tickets', [
            'tickets' => $tickets
        ]);
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('ticket-detail', [
            'ticket' => $ticket,
        ]);
    }

    public function delete($id)
    {
        $ticket = Ticket::find($id);
        $error = null;
        if ($ticket != null) 
        {
            if ($ticket->user_id == auth()->user()->id) 
            {
                Ticket::where('id', $ticket->id)->delete();
                return Redirect::home()->with("success", "Il Ticket è stato rimosso con successo!");
            }
        } 
        else
            return Redirect::home()->with("error", "Il ticket non esiste o non è stato aperto dalle tue credenziali");
            
    }
}
