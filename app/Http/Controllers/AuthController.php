<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Session;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:6'
        ]);

        if(User::where('email', $request->email)->value('google_id') != null){
            $request->session()->put('error', 'Please login using google!');
            return redirect()->back();
        }

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('dashboard');
        }

        $request->session()->put('error', 'Invalid email or password!');
        return redirect()->back();
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password'=> 'required|min:6'
        ]);

        if($request->password !== $request->confirm_password){
            $request->session()->put('error', 'password not match!');
            return redirect()->back();
        }

        if(User::where('email', $request->email)->exists()){
            $request->session()->put('error', 'Email already exists! Please login.');
            return redirect()->route('login');
        }

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function google(){
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(){
        $googleUser = Socialite::driver('google')->user();
        $user = User::updateOrCreate([
            'google_id' => $googleUser->getId(),
        ], [
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'password' => '',
        ]);
        Auth::login($user);
        return redirect('/dashboard');
    }
}
