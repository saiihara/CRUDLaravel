<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

@extends('layouts.app')

<body>

<nav>
    <a href='{{ route("principal") }}'>Inicio</a> 
    <a href='{{ route("phones") }}'>Moviles</a>
    <a href='{{ route("tiendas.index") }}'>Ver tiendas</a>
</nav>

@if($tienda)
    <p>ID: {{ $tienda->id_tienda }}</p>
    <p>Nombre: {{ $tienda->nombre }}</p>
    <p>Localizacion: {{ $tienda->localizacion }}</p>
    <p>CID: {{ $tienda->cid }}</p>
    <p>Número de trabajadores: {{ $tienda->numero_trabajadores }}</p>

    @if (session('role') && (session('role') === 'administrador' || session('role') === 'Editor'))
        <a href="{{ route('tiendas.editar', $tienda->id_tienda) }}">Editar Tienda</a>

        <form action="{{ route('tiendas.eliminar', $tienda->id_tienda) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar Tienda</button>
        </form>
    @endif

@else
    <p>Tienda not found.</p>
@endif

</body>
</html>
