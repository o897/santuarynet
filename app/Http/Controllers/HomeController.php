<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comments = Ticket::all();

        return view('comments')->with([
            'comments' => $comments
        ]);
    }

    public function replies($id)
    {    
        $comment = Ticket::where('ticket_id',$id)->get();

        $replies = Reply::all()->where('post_id',$id);

        return view('replies')->with([
            'replies' => $replies,
            'comment' => $comment        
        ]);
    }

    
    public function store(Request $request,$id)
    {
        Reply::create([
            'user_id' => Auth::id(),
            'post_id' => $id,
            'content' => $request->content,
        ]);

        return redirect()->back();
    }

    
    public function destroy($id)
    {
        Reply::find($id)->delete();
        return redirect()->back();
    }

    // Admin clicks a link to view the ticket
    public function mail($id)
    {
        $ticket = Ticket::findOrFail($id);      
        return view('user.mail.ticket')->with('ticket',$ticket);
    }
}
