<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

@extends('layouts.app')



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

    <h1>Registros de Logs</h1>

    @if ($logs->isEmpty())
        <p>No hay registros de logs.</p>
    @else
    <table class="logs-table">
        <thead>
            <tr>
                <th>Fecha y Hora</th>
                <th>Acción</th>
                <th>Tabla Afectada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
            <tr>
                <td>{{ $log->created_at }}</td>
                <td>{{ $log->accion }}</td>
                <td>{{ $log->tabla_afectada }}</td>
                <td>
                    <form action="{{ route('logs.destroy', $log->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete-button" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</body>
</html>