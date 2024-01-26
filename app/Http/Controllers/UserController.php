<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

      /**
     * Muestra una lista de todos los usuarios.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $users = User::all();
        return view('users.index', compact('users'));
    }

     /**
     * Muestra el formulario para editar un usuario.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id){
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }


    /**
     * Actualiza la información de un usuario específico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role; 
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }
}