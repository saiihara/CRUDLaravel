<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->intended('/admin/dashboard');
        }

        // Autenticación fallida
        return redirect()->route('admin.login')->with('error', 'Credenciales incorrectas');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

