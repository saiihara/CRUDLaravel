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

    <nav>
        <a href='{{ route("principal") }}'>Inicio</a>
        <a href='{{ route("phones") }}'>Ver móviles</a>
    </nav>

    <div class="tiendas-lista">
        <h2>Listado de Tiendas</h2>

        <!-- Enlace para añadir tienda -->
        <a href="{{ route('tiendas.crear') }}">Añadir Tienda</a>

        @if (count($tiendas) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Localización</th>
                        <th>Número de Trabajadores</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tiendas as $tienda)
                        <tr>
                            <td>{{ $tienda->nombre }}</td>
                            <td>{{ $tienda->localizacion }}</td>
                            <td>{{ $tienda->numero_trabajadores }}</td>
                            <td>
                                <!-- Enlace para editar -->
                                <a href='{{ route("tiendas.editar", $tienda->id_tienda) }}'>Editar</a>

                                <!-- Formulario para eliminar con confirmación -->
                                <form method="post" action='{{ route("tiendas.eliminar", $tienda->id_tienda) }}' style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Estás seguro de que quieres borrar esta tienda?')">Eliminar</button>
                                </form>
                            </td>
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
