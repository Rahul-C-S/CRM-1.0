<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function index(){

        return view('user.login');
    }

    public function doLogin(){

        $input = request()->only(['username', 'password']);
        if(auth()->attempt($input)){

            return redirect()->route('dashboard')->with('success_message', 'Login Successfull!');
        }else{
            return redirect()->route('login')->with('error_message', 'Invalid Credentials!');
            
        }
    }
}
