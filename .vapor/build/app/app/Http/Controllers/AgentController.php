<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Reply;
use App\Models\Ticket;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:agent']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all()->where('agent_id',Auth::id());

        return view('agent.index')->with([
            'tickets' => $tickets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $tickets = Ticket::all()->where('agent_id',Auth::id());

        return view('agent.create')->with([
            'tickets' => $tickets,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // View the ticket with all its contents files, status comments etc

        $ticket = Ticket::find($id);
       
       return view('agent.show')->with([
           'ticket' => $ticket,
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
      
       //Agent click the ticket to be edited then boom it shows up for him to update with a comment or a status
       $ticket = Ticket::find($id);
       
       return view('agent.edit')->with([
           'ticket' => $ticket,
       ]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agent_update = $request->validate([
            'status' => 'required|string', //|in:open,closed,pending'
        ]);

        // Agent will still be able to view tickets when you click view comments
        if ($request->content != '') {
                Reply::create([
                'post_id' => $id,
                'user_id' => Auth::id(),
                'content' => $request->content
            ]);
        }
        
        
        Ticket::where('ticket_id', $id)->update(['status' => $agent_update['status']]);

        Log::create([
            'user' => auth()->user()->roles->pluck('name')->first(),
            'message' => auth()->user()->name . 'just updated a user ticket to' . $request->status  . 'at 19:00'   
        ]);

        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
