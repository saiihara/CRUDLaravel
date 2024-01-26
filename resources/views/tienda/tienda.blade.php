<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@extends('layouts.app')

@section('titulo', 'Tiendas')

@section('contenido')

<section class="menu-section">
    <nav>
        <a href='{{ route("principal") }}' class="menu-item">Inicio</a>
        <a href='{{ route("phones") }}' class="menu-item">Ver móviles</a>
    </nav>

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

    <div class="tiendas-lista">
        <h2>Listado de Tiendas</h2>

        @if (session('role') && (session('role') === 'administrador' || session('role') === 'Añadidor'))
            <a href="{{ route('tiendas.crear') }}">Añadir Tienda</a>
        @endif
        

        @if (count($tiendas) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Localización</th>
                        <th>Número de Trabajadores</th>
                        @if (session('role') && (session('role') === 'administrador' || session('role') === 'Añadidor'))
                            <th>Acciones</th>
                         @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($tiendas as $tienda)
                        <tr>
                            <td>{{ $tienda->nombre }}</td>
                            <td>{{ $tienda->localizacion }}</td>
                            <td>{{ $tienda->numero_trabajadores }}</td>
                          
                                
                            @if (session('role') && (session('role') === 'administrador' || session('role') === 'Añadidor')) 
                                <td>
                             
                                    <a href='{{ route("tiendas.editar", $tienda->id_tienda) }}'>Editar</a>

                                    <form method="post" action='{{ route("tiendas.eliminar", $tienda->id_tienda) }}' style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Estás seguro de que quieres borrar esta tienda?')">Eliminar</button>
                                    </form>
                                </td>
                             @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay tiendas en la base de datos.</p>
        @endif
    </div>

@endsection

</body>
</html>
