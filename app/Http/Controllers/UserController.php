<?php

namespace App\Http\Controllers;
use App\models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        User::create([
            'name' => $request->businessname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phonenumber
        ]);
        return redirect()->route('sign-in');
    }
    public function login(Request $request){
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = User::whereEmail($request->email)->first();
            return redirect()->route('home');
        }
        return redirect()->route('sign-in');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('sign-in');
    }
}
