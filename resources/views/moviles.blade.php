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

@section('titulo', 'phones')

@section('contenido')

<!-- @if(Session::has('success'))
{{-- Muestra un mensaje de éxito si existe --}}
    <div class="alert alert-success"> -->
      <!-- //si la variable success existe muestra un mensaje de success -->
        <!-- {{ Session::get('success') }} -->
    <!-- </div>
@endif -->



<section class="menu-section">
    <nav>
        <a href='{{ route("principal") }}' class="menu-item">Inicio</a>
        <a href='{{ route("tiendas.index") }}' class="menu-item">Tiendas</a>

        @if (session('role') && (session('role') === 'administrador' || session('role') === 'editor'))
            <a href='{{ route("añadir") }}' class="menu-item">Añadir móviles</a>
        @endif

        @if (session('role') && (session('role') === 'administrador'))
            <a href='{{ route("log.log") }}' class="menu-item">Ver logs</a>
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


    <h2 style="margin-left: 30px;">Móviles</h2>

    <p style="margin-left: 30px;">Tabla con todos los móviles</p>

    <form action="{{ route('phones') }}" method="GET" style="margin-bottom: 20px;">
        <label  style="margin-left: 30px;" for="buscar">Buscar por modelo:</label>
        <!-- //buscar para después usarlo en "composiciones" -->
        <!-- El campo de texto (buscar) se rellena con el valor actual del término de búsqueda ($busqueda). -->
        <input  style="margin-left: 30px;" class="busqueda" type="text" name="buscar" id="buscar" value="{{ $busqueda }}">
        <button  type="submit">Buscar</button>
    </form>

    @if (count($phones) > 0)
    <!-- Si phones tiene al menos un elemento lo muestra -->
        {{-- Muestra la tabla de móviles si hay elementos en el array --}}
        <table>
          <thead>
            <tr>
              <th>Modelo</th>
              <th>Tienda</th>
              <th>Lanzamiento</th>
              <th>Pantalla</th>
              <th>Precio</th>
              @if (session('role') && (session('role') === 'administrador' || session('role') === 'Editor'))
                    <th>Acciones</th>
              @endif

            </tr>
          </thead>
          <tbody>
          @foreach ($phones as $phone)
    <tr>
        <td>{{ $phone->modelo }}</td>
        <td>
        @if ($phone->tienda)
            <a href="{{ route('tiendas.show', $phone->tienda->id_tienda) }}">View Tienda: {{ $phone->tienda->nombre }}</a>
        @else
            Sin tienda asignada
        @endif
        </td>
        <td>{{ $phone->lanzamiento }}</td>
        <td>{{ $phone->pantalla }}</td>
        <td>{{ $phone->precio }}</td>

        @if (session('role') && (session('role') === 'administrador' || session('role') === 'Editor'))
            <td>
                {{-- Enlace para editar --}}
                <a class="editar" href="{{ route('editar', $phone->id) }}">Editar</a>
                {{-- Formulario para eliminar con confirmación --}}
                <form action="{{ route('eliminar', $phone->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button class="eliminar" type="submit" onclick="return confirm('¿Estás seguro de que quiere borrar este log?')">Eliminar</button>
                </form>
            </td>
        @endif
        
    </tr>
@endforeach







          </tbody>
        </table>

    @else
        {{-- Muestra un mensaje si no hay móviles --}}
        <p>¡No hay móviles en la base de datos!</p>
    @endif


    @if (count($phones) > 0)
    {{-- Muestra la tabla de móviles si hay elementos en el array --}}

        
<!-- 
        <h2 style="margin-left: 30px;">Logs</h2>
        @if(Session::has('log_messages'))
        @foreach(Session::get('log_messages') as $log)
            <div class="alert alert-info">
                {{ $log }}
            </div>
        @endforeach
    @endif -->

    @else
    {{-- Muestra un mensaje si no hay móviles --}}
        <p>¡No hay móviles en la base de datos!</p>

    @endif

@endsection

</body>
</html>