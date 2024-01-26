<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{

     /**
     * Muestra el formulario de inicio de sesión.
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function showLoginForm(){
        return view('auth.login');
    }

    
    /**
     * Procesa la solicitud de inicio de sesión.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function login(Request $request){
        //Busca al usuario por su nombre
        $user = User::where('name', $request->name)->first();

        //Busca si el usuario existe 
        if ($user) {
            //Inicia una sesión con el nombre y rol del usuario
            $request->session()->put('name', $user->name);
            $request->session()->put('role', $user->role);

            //Redirije a la vista
            // dd(session()->all());
            return redirect()->route('inicio')->with('message', 'Login correcto');
        
        }

        return redirect()->route('login')->with('error', 'Usuario no encontrado');
    }

      /**
     * Cierra la sesión del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function logout(Request $request)
    {

        //elimina el rol y nombre 
        Session::forget('name');
        Session::forget('role');

        return redirect()->route('inicio')->with('message', 'Logout correcto');
    }
}