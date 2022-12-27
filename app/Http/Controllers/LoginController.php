<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_action(Request $request)
    {
        $request ->validate([
            'username'=> 'required',
            'password'=> 'required',
        ]);


        if (Auth::attempt(['username'=>$request->username, 'password'=>$request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors('password', 'wrong username or password');
    }

}
