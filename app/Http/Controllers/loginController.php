<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validate)) {
            if (Auth::user()->role->name == "approver") {
                return redirect()->route('home-approver');
            } else {
                return redirect()->route('home-admin');
            }
        }

        return redirect()->back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();

            return redirect('/');
        }

        return redirect()->back();
    }
}
