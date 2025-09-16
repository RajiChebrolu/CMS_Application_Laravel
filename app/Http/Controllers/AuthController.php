<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        //validate
        $fields = $request->validate([
            'first_name' =>['required', 'max:255'],
            'last_name' =>['required', 'max:255'],
            'email' =>['required', 'max:255', 'email', 'unique:users'],
            'password' =>['required', 'min:3', 'confirmed'],
        ]);

        //dd($fields);
        //Register
        $user = User::create($fields);
        //dd('User registered and logged in');

        Auth::login($user);

        //Redirect
        return redirect()->route('dashboard');
    }
    //login
    public function login(Request $request)
    {
        //validate
        $fields = $request->validate([
            'email' =>['required', 'max:255', 'email'],
            'password' =>['required'],
        ]);

        //dd('request');
        //Try to login the user
        if (Auth::attempt($fields, $request->remember)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'failed' =>'Wrong password or email'
            ]);
        }
    }
    public function logout(Request $request){
       // dd('ok');
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect('/');
    }
}
