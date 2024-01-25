<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validar los datos del usuario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear un nuevo registro de usuario con rol 'invitado'
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'invitado', // Establecer el rol por defecto
        ]);

        // Redirigir al usuario a la vista de inicio con un mensaje de éxito
        return redirect()->route('inicio')->with('name', $user->name)->with('success', 'Registro exitoso');
    }
}
