<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $request->session()->put('name', $request->name);

        return redirect()->route('inicio')->with('message', 'You have been logged in successfully!');
    }

    public function logout(Request $request)
    {
        Session::forget('name');

        return redirect()->route('inicio')->with('message', 'You have been logged out successfully!');
    }
}