<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegister;
use App\Http\Requests\UserLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function register(UserRegister $request){
        $validate = $request->validated();
        $validate["password"] = bcrypt($validate["password"]);
        $user = User::create($validate);
        if($user){
            return redirect(route('sign-in'));
        }else {
            return redirect()->back();
        }
//        return response()->json([
//            'user' =>$user,
//            'message'=>'register success'
//        ], 200);

    }
    public function loginApi(UserLogin $request){
        $validate = $request->validated();
        if(auth()->attempt($validate)){
            $user = auth()->user();
            $token = $user->createToken("hoctienganh")->accessToken;
            dd($token);
            return response()->json([
                'user' =>$user,
                'message'=>'login success',
                'token'=>$token,
            ], 200);
        }else {
            return response()->json([
                'message'=>'login error',
            ], 211);
        }
    }
    public function login(UserLogin $request){
        try {
            $validate = $request->validated();
            if(auth()->attempt($validate)){
                $user = auth()->user();
                $authCtrl = new AuthController();
                $token = $user->createToken("hoctienganh")->accessToken;
                $cookie = cookie('token', $token);

            return redirect(route('admin.home'))->with('token', $token);
            }else {
                return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
            }
        }catch (\Exception $e){
            print_r($e);
        }

    }
    public function getUser(){
        $user = auth()->user();
        return response()->json(['user'=> $user], 200);
    }
}