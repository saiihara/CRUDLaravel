<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
{
    return view('auth.login');
}

public function login(Request $request)
{
    $credentials = $request->only('name', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed...
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors(['email' => 'No coincide con nuestros registros'])->withInput($request->only('name'));
}

}
