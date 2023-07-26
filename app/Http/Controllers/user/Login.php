<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function index()
    {

        return view('user.login');
    }

    public function doLogin()
    {

        

        if ($user = User::where('username', '=', request('username'))->first()) {

            if($user['status'] != 1) return redirect()->route('login')->with('error_message', 'Your account is not active! Please contact administrator.');
        }

        $input = request()->only(['username', 'password']);

        if (auth()->attempt($input, request('remember_me'))) {

            return redirect()->route('dashboard')->with('success_message', 'Login Successfull!');
        } else {
            return redirect()->route('login')->with('error_message', 'Invalid Credentials!');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
