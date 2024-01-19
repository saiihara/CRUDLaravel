<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

@extends('layouts.app')


@if($tienda)

<body>

<nav>
      <a href='{{ route("principal") }}'>Inicio</a> 
      <a href='{{ route("phones") }}'>Moviles</a>
      <a href='{{ route("tiendas.index") }}'>Ver tiendas</a>

    </nav>

    <p>ID: {{ $tienda->id_tienda }}</p>
    <p>Nombre: {{ $tienda->nombre }}</p>
    <p>Localizacion: {{ $tienda->localizacion }}</p>
    <p>CID: {{ $tienda->cid }}</p>
    <p>Número de trabajadores: {{ $tienda->numero_trabajadores }}</p>

    @if($tienda->id_tienda)
    <!-- para verificar si la variable $tienda está definida y no es nula  -->
        <a href="{{ route('tiendas.editar', $tienda->id_tienda) }}">Editar Tienda</a>
       
        <form action="{{ route('tiendas.eliminar', $tienda->id_tienda) }}" method="POST">
        <!-- Los enlaces utilizan la función route de Laravel para generar URLs basadas en nombres de ruta. -->
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar Tienda</button>
        </form>
    @else
        <p>Tienda ID not found.</p>
    @endif

@else
    <p>Tienda not found.</p>
@endif

</body>
</html>