<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Illuminate\View\View;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('index')->with('AC', 'Please log out to create another account.');
        }

        return view("auth.login");
    }

    public function authenticate(Request $request)
    {
        // Validate the request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('index')->withSuccess( 'You have successfully logged in!');
        }

        // Redirect back with error if authentication fails
        return back()->withErrors(['email' => 'Your provided credentials do not match in our records.'])->onlyInput('email');
    } 
}
