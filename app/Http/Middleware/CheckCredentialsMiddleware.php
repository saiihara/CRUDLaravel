<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCredentialsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->username === 'usuario' && Auth::user()->password === bcrypt('usuario')) {
            return $next($request);
        }

        return redirect()->route('inicio')->with('error', 'Credenciales incorrectas');
    }
}

?>