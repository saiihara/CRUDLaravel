<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/tiendas/editar.blade.php -->

@extends('layouts.app')

@section('titulo', 'Editar Tienda')

@section('contenido')

    <nav>
        <a href='{{ route("principal") }}'>Inicio</a> |
        <a href='{{ route("phones") }}'>Moviles</a> |
        <a href='{{ route("tiendas.index") }}'>Tiendas</a>
    </nav>

    <div class="editar-tienda">
        <h2>Editar Tienda</h2>

        <form method='post' action='{{ route("tiendas.actualizar", $tienda->id_tienda) }}'>
            @csrf
            @method('PUT')

            <label>Nombre:</label>
            <input type='text' name='nombre' value='{{ $tienda->nombre }}' required='required'><br />
            <label>Localización:</label>
            <input type='text' name='localizacion' value='{{ $tienda->localizacion }}' required='required'><br />
            <label>CID:</label>
            <input type='text' name='cid' value='{{ $tienda->cid }}' required='required'><br />
            <label>Número de Trabajadores:</label>
            <input type='number' name='numero_trabajadores' value='{{ $tienda->numero_trabajadores }}' required='required'><br /><br />
            <input class="boton" type='submit' value='Actualizar'>
        </form>
    </div>

@endsection

</body>
</html>

<!-- @method('PUT') para indicar que la solicitud HTTP será de tipo PUT. Esto es común en formularios de edición en Laravel. -->