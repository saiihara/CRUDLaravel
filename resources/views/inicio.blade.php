<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='{{ asset("css/styles.css") }}'>
  <title>Document</title>
</head>
<body>
@extends('layouts.app')


@section('contenido')



<section class="menu-section">
    <nav>
        <a href='{{ route("principal") }}' class="menu-item">Inicio</a>
        <a href='{{ route("phones") }}' class="menu-item">Phones</a>
        <a href='{{ route("phones") }}' class="menu-item">Ver móviles</a>
        <a href='{{ route("tiendas.index") }}' class="menu-item">Ver Tiendas</a>
        

        @if (session('role') && (session('role') === 'administrador' || session('role') === 'editor'))
            <a href='{{ route("añadir") }}' class="menu-item">Añadir móviles</a>
            <a href='{{ route("tiendas.crear") }}' class="menu-item">Añadir Tienda</a>
        @endif

        @if (session('role') && (session('role') === 'administrador'))
            <a href='{{ route("users.index") }}' class="menu-item">Ver usuarios</a>
            <a href='{{ route("log.log") }} ' class="menu-item">Ver logs</a>
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


@if (Session::has('name'))
    <h1>Bienvenid@, {{ Session::get('name') }}!</h1>
@else
    <h1>Hola, invitado</h1>
@endif

<p>CRUD básico para una compañía que distribuye móviles y tiendas</p>

<img src="https://images.ctfassets.net/63bmaubptoky/ujYI6HcFvv8XYVy5p6A3s/c297dd953a9ff5e0619a03b1d1e64f35/software-de-base-de-datos-gratuito-ES-Capterra-Header.png" alt="Empresa Image" class="company-image">

@endsection

</body>
</html>
