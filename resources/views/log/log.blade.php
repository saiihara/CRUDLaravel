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



<nav>
        <a href='{{ route("principal") }}'>Inicio</a>
        <a href='{{ route("añadir") }}'>Añadir móvil</a>
        <a href='{{ route("tiendas.index") }}'>Tiendas</a>
        <a href='{{ route("log.log") }}'>Ver logs</a>
    </nav>

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