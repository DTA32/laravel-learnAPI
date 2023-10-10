<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:6'
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('dashboard');
        }

        $request->session()->put('error', 'Invalid email or password!');
        return redirect()->back();
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password'=> 'required|min:6'
        ]);

        if($request->password !== $request->confirm_password){
            $request->session()->put('error', 'password not match!');
            return redirect()->back();
        }

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'type' => 1,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
