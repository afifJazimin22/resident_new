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
        // $validateUser = $request ->validate([
        //         'username'=> 'required',
        //         'password'=> 'required',
        //     ]);


        // if (Auth::attempt(['username'=>$validateUser['username'], 'password'=>$validateUser['password']])) {
        //     return redirect()->intended('/resident');
        // }
        // return back()->withErrors('password', 'wrong username or password');
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Alert::success('Success', 'Login successfull');
            return redirect()->route('resident.index');
        }
        // Alert::error('Error', 'Login failed');
        return redirect("/login");
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/login');
    }

}
