<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /**
     * Muestra el formulario de registro
     *
     * @return \Illuminate\View\View
     */

    public function showRegistrationForm(){
        return view('auth.register');
    }

    /**
     * Maneja el registro del usuario
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function register(Request $request){

        $user = User::create([
            'name' => $request->name, 
            'email' => $request->email,
            'password' => Hash::make('password'), 
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
}