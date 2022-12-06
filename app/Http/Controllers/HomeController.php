<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('pages.admin.dashbroad.index');
    }
    public function index(){
        return view('pages.frontend.index');
    }
    public function testPage(){
        return view('pages.frontend.testpage');
    }
    public function vocabularyTest(){
        return view('pages.frontend.vocabulary');
    }
    public function signIn(){
        return view('pages.sign-in');
    }
    public function signUp(){
        return view('pages.sign-up');
    }
    public function signUpEmail(){
        return view('pages.sign-up-email');
    }
    public function recoverPassword(){
        return view('pages.recover-password');
    }


}
