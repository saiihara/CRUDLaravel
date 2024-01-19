<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('titulo', 'Insertar')

@section('contenido')

    <nav >
      <a href='{{ route("principal") }}'>Inicio</a>
      <a href='{{ route("phones") }}'>Moviles</a>
      <a href='{{ route("tiendas.index") }}'>Tiendas</a>
      Añadir
    </nav>

    <div class="texto-insertar">
    <h2>Añadir un movil</h2>

    <p>Página para insertar un móvil a la base de datos</p>
    </div>


    <div class="div-insertar">
    <form method='post' action='{{ route("guardar") }}'>
        @csrf
        <label>Modelo:</label>
        <input type='text' name='model' required='required'><br />
        <label>Tienda:</label>
        <select name="tienda_id">
            @foreach ($tiendas as $tienda)
                <option value="{{ $tienda->id_tienda }}">{{ $tienda->nombre }}</option>
            @endforeach
        </select>


        <label>lanzamiento:</label>
        <input type='date' name='launch' required='required'><br />
        <label>Pantalla:</label>
        <input type='text' name='screen' required='required'><br />
        <label>Precio:</label>
        <input type='number' name='price' required='required'><br /><br />
        <input class="boton" type='submit' value='Enviar'>
    </form>
    </div>
   

@endsection
</body>
</html>