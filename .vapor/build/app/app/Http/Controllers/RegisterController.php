<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
// Create new Users Controller
class RegisterController extends Controller
{
    //
    use HasRoles;

    public function registerForm() 
    {

        return view('register');
    }
    
        public function register(Request $request)
        {
            // Get the role you want to assign
            $role = Role::where('name','user')->first();
        
             $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'location' => $request->location,
                'password' => Hash::make($request->password),
             ]);

             $user->assignRole($role);
    

            return redirect()->route('login.form');
    }
}
