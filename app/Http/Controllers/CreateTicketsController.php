<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\Services\GenericServices;
use Illuminate\Support\Facades\Redirect;

class CreateTicketsController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('create-ticket',[
            'categories' => $categories
        ]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'object' => ['required', 'max:255'],
            'category_id' => ['required'],
            'description' => ['required', 'max:255']
        ]);

        if(Category::find($request->category_id) == null){
            return redirect('/create')->with("error", "La categoria inserita non esiste");
        }

        $ticket = new Ticket();
        $ticket->object = $request->object;
        $ticket->category_id = $request->category_id;
        $ticket->description = $request->description;
        $ticket->user_id = auth()->user()->id;
        $ticket->created_at = date("Y-m-d H:i:s");
        $ticket->updated_at = date("Y-m-d H:i:s");

        $ticket->save();

        //Mail Send
        $genericServices = new GenericServices();
        $genericServices->createdTicketMail($ticket);

        return Redirect::home()->with("success", "Il Ticket è stato inserito con successo!");
    }
}
