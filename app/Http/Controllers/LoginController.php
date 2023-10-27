<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{

    public function loginForm()
    {
        return view('login');
    }

    public function githubUser() {
        $githubUser = Socialite::driver('github')->user();

        // Check if the user already exists in your application's database
        $user = User::where('email', $githubUser->getEmail())->first();
    
        if (!$user) {
            // If the user doesn't exist, create a new user with the GitHub data
            $user = User::create([
                'name' => $githubUser->getName(),
                'email' => $githubUser->getEmail(),
                'password' => Hash::make(Str::random(32)),
            ]);
        }
    
        // Authenticate the user
        Auth::login($user);
    
        // Redirect the user to their dashboard or other page
        return redirect('/user');
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            // Admin role: 2 , Agent role: 1 , User role: 0
            if (auth()->user()->hasRole('admin')) 
            {
              $request->session()->regenerate();
              return redirect()->route('admin.index');

            } elseif (auth()->user()->hasRole('agent')) {

              $request->session()->regenerate();
              return redirect()->route('agent.index');

            } elseif (auth()->user()->hasRole('user')) {

                $request->session()->regenerate();
                return redirect()->route('user.index');

            }

        }
        
        dd("Wrong password");


        return back()->withErrors([
            'email' => 'The provided credentails do not match our records.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }


public function redirectToFacebook()
{
    return Socialite::driver('facebook')->redirect();
}

public function handleFacebookCallback()
{
    $user = Socialite::driver('facebook')->user();

    $existingUser = User::where('email', $user->email)->first();

    if ($existingUser) {
        Auth::login($existingUser);
    } else {
        $newUser = new User();
        $newUser->name = $user->name;
        $newUser->email = $user->email;
        $newUser->password = bcrypt(str_random(16));
        $newUser->save();
        Auth::login($newUser);
    }

    return redirect('/user');
}
}
