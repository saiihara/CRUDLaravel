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

@section('titulo', 'Editar Teléfono')

@section('contenido')

    <nav >
        <a href='{{ route("principal") }}'>Inicio</a> 
        <a href='{{ route("tiendas.index") }}' class="menu-item">Tiendas</a>|
        <a href='{{ route("phones") }}'>Phones</a> |
        <a href='{{ route("añadir") }}'>Añadir</a>
    </nav>

    
    <div class="texto-insertar">
    <h2>Editar un movil</h2>

    <p>Página para editar un móvil de la base de datos </p>
    </div>

    <div class="div-edit">
    <form method='post' action='{{ route("actualizar", $phone->id) }}'>
        @csrf
        @method('PUT')
        <!-- Necesario para indicar que es una solicitud de actualización -->
        <!-- PUT se utiliza para indicar que estás realizando una operación de actualización en lugar de una operación de creación (POST) en el servidor. -->
        

        <label>Modelo:</label>
        <input type='text' name='model' value='{{ $phone->modelo }}' required='required'><br />
        <label>Tienda:</label>
        <select name="tienda_id">
            @foreach ($tiendas as $tienda)
                <option value="{{ $tienda->id_tienda }}">{{ $tienda->nombre }}</option>
            @endforeach
        </select>


        <input type='date' name='launch' value='{{ $phone->lanzamiento }}' required='required'><br />
        <label>Pantalla:</label>
        <input type='text' name='screen' value='{{ $phone->pantalla }}' required='required'><br />
        <label>Precio:</label>
        <input type='number' name='price' value='{{ $phone->precio }}' required='required'><br /><br />


        </div>

        <input class="boton" type='submit' value='Actualizar'>
    </form>
    </div>
    

@endsection

</body>
</html>