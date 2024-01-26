<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@extends('layouts.app')


@section('contenido')

<section class="menu-section">
    <nav>
        <a href='{{ route("phones") }}' class="menu-item">Phones</a>
        <a href='{{ route("phones") }}' class="menu-item">Ver móviles</a>
        <a href='{{ route("tiendas.index") }}' class="menu-item">Ver Tiendas</a>
        

        @if (session('role') && (session('role') === 'administrador' || session('role') === 'editor'))
            <a href='{{ route("añadir") }}' class="menu-item">Añadir móviles</a>
            <a href='{{ route("tiendas.crear") }}' class="menu-item">Añadir Tienda</a>
        @endif

        @if (session('role') && (session('role') === 'administrador'))
            <a href='{{ route("users.index") }}' class="menu-item">Ver usuarios</a>
            <a href='{{ route("log.log") }}'>Ver logs</a>
        @endif
    </nav>

    <!-- Display logout or login links -->
    @if (session()->has('name'))
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-sign-out" style="color: white"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
     
    @else
        <a href="{{ route('login') }}">
            <i class="fa-solid fa-user" style="color: white"></i>
        </a>
    @endif
</section>

    <h1 class="logintitle">Login</h1>

    <form class="loginresform" method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label for="name">Username:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    </div>
    <div>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required autocomplete="current-password">
    </div>
    <button type="submit">Login</button>
</form>

    <div class="tips">
        <p>No estás registrado? <a href="{{ route('register') }}">Regístrate</a></p>
        <p>Nota de Sofía: el admin es "admin" "123"</p>
        <p>Un usuario normal es "Paco" "123" </p>
        <p>Un usuario editor es "Naruto" "123" </p>
        <p>Un usuario que añade es "Joselina" "123" </p>
    </div>

</body>
</html>