<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Task;
use App\Models\User;
use App\Models\Admin;
use App\Models\Label;
use App\Models\Ticket;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    use HasRoles;

    public function __construct()
    {
        $this->middleware(['role:admin']);
        // date_default_timezone_set("Africa/Johannesburg");

    }

    public function index()
    {

        // You should db raw on get the should be a column called count get the count from there        

        $startDate = Carbon::now()->subDays(6); // Get the date 7 days ago
        $endDate = Carbon::now(); // Get today's date
        
        $ticketCounts = DB::table('tickets')
        ->select(DB::raw('DATE_FORMAT(created_at, "%W") AS day'), DB::raw('COUNT(*) as count'))
        ->whereBetween('created_at', [$startDate, $endDate])
        ->groupBy('day')
        ->orderBy('day') // Order by the "day" column instead of "created_at"
        ->pluck('count', 'day');

        
        $labels = $ticketCounts->keys();
        $count = $ticketCounts->values();

        return view('admin.index')->with([
            'labels' => $labels,
            'count' => $count
        ]);

    }

    public function tickets()
    {
        $agent = User::role('agent')->get();
        $tickets = Ticket::latest()->paginate(5);
        return view('admin.tickets')->with([
            'tickets' => $tickets,
            'agents' => $agent
        ]);
    }

    public function users()
    {
        $users = User::latest()->paginate(5);
        return view('admin.users')->with([
            'users' => $users,         
        ]);
    }

    public function log()
    {
        $logs = Storage::files('logs/'); 
            
        if (count($logs) === 0) {
            $logs = [];
        }
           
        return view('admin.logs',[
            'logs' => $logs
        ]);
    }

    public function categories()
    {
        $categories = Category::select('category','id')->get();
        return view('admin.categories')->with('categories',$categories);
    }

    public function labels()
    {
        $labels = Label::select('label','id')->get();
        return view('admin.labels')->with('labels',$labels);
    }

    public function storeCategory(Request $request)
    {
      Category::create([
        'category' => $request->input('new_category')
      ]);

      Log::create([
        'message' => 'Admin created a new category -> '. $request->new_category,
    ]);

      return redirect()->back();
    }

    public function storeLabel(Request $request)
    {
      Label::create([
        'label' => $request->input('new_label')
      ]);

      Log::create([
        'message' => 'Admin created a new label -> '. $request->new_label,
    ]);

      return redirect()->back();
    }

    public function create()
    {
        // Creating a new user and assigning roles
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // Register user and assign roles

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'title' => $request->title,
            'name' => $request->name,
            'email' => $request->email,
            'location' => $request->location,
            'password' => Hash::make($request->password),
        ])->assignRole($request->role);

        Log::create([
            'message' => 'Admin registered a new user role : ' . $request->role,
        ]);

        return redirect()->back();
    }


   
    public function show($id)
    {
        $ticket = Ticket::find($id);

        // To find specifics about the ticket
        return view('admin.show')->with('ticket',$ticket);
    }

  
    public function edit($id)
    {
        // list tickets and agents
        $ticket = Ticket::find($id);
        $admins = User::all()->where('role',2);

        return view('admin.edit')->with([
            'ticket' => $ticket,
            'admins' => $admins
        ]);
    }

   
    public function update(Request $request, $id)
    {   
       //Assign the agent to a ticket
        $request->validate([
            'agent' => 'required',
        ]);

        $agent_id = User::where('id',$request->input('agent'))->value('id');

        $ticket_update = Ticket::where('ticket_id',$id)
        ->update(['agent_id' => $agent_id]);

        return redirect()->back();
    }

    public function updateCategory(Request $request)
    {   
        Category::where('id',$request->id)->update(['category' => $request->category]);
        return redirect()->back();
    }

     public function updateLabel(Request $request)
    {
        Label::where('id',$request->id)->update(['label' => $request->label]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back();

    }

    public function deleteLabel($id)
    { 
        Label::find($id)->delete();    
        return redirect()->back();
    }

    public function deleteCategory($id)
    { 
        Category::find($id)->delete();
        return redirect()->back();
    }

    public function download($id) {
        return Storage::disk('local')->download('logs/'.$id);
    }
}
