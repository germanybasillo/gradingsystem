<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class Register extends Controller
{
    public function register(): View{
        return view("auth.register");
    }

    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'name' => 'required|string|max:250',
        'email' => 'required|email|max:250|unique:users',
        // 'user_type' => 'required|in:student,teacher', 
        'password' => 'required|min:8|confirmed'
    ]);
    
    $data = $request->all();

    $user = new User();
    $user->name = $data['name'];
    $user->email = $data['email'];
    // $user->user_type = $data['user_type'];
    $user->password = Hash::make($data['password']);
    $user->save();

    // Attempt to log in the new user
    $credentials = $request->only('email', 'password');
    Auth::attempt($credentials);

    // Regenerate session and redirect to dashboard
    $request->session()->regenerate();
    return redirect()->route('index')->withSuccess('You have successfully registered & logged in!');
}
}