<!-- añadirTienda.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@extends('layouts.app')

@section('titulo', 'Añadir Tienda')

@section('contenido')

    <nav>
        <a href='{{ route("principal") }}'>Inicio</a> |
        <a href='{{ route("phones") }}'>Tiendas</a>
    </nav>

    <div class="insertar-tienda">
        <h2>Añadir Tienda</h2>

        <form method="post" action='{{ route("tiendas.guardar") }}'>
            @csrf

            <label>Nombre:</label>
            <input type='text' name='nombre' required='required'><br />
            <label>Localización:</label>
            <input type='text' name='localizacion' required='required'><br />
            <label>CID:</label>
            <input type='text' name='cid' required='required'><br />
            <label>Número de Trabajadores:</label>
            <input type='number' name='numero_trabajadores' required='required'><br /><br />
            <input class="boton" type='submit' value='Enviar'>
        </form>
    </div>

@endsection

</body>
</html>


<!-- La directiva @csrf genera un campo de entrada CSRF que es esencial para proteger contra ataques de falsificación de solicitudes entre sitios (CSRF). -->