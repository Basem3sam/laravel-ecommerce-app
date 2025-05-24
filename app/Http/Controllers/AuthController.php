<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function validateUser(Request $request){
        $messages = [
            'email.required' => 'your e-mail address is empty!',
            'email.email' => 'Please enter a valid e-mail address!',
            'password.required' => 'Please enter your password!',
            'password.min' => 'Your password must be at least 8 chars!',
        ];

        $checker = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ], $messages);
        
        if (Auth::attempt($checker)){
            $request->session()->regenerate();
            if(Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.home');
        }
        return redirect()->back()->withErrors([
            'ERROR' => 'Invalid user or password!!'
    ]);
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required|min:5|max:30',
            'email'=> 'required|email',
            'password'=> 'required|min:8'
        ]);

        User::create([
            'name' => $request -> username,
            'email' => $request -> email,
            'password' => $request -> password
        ]);

        return redirect()->route('auth.login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.home');
    }
}
