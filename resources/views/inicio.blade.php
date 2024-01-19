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

  @section('titulo', 'Inicio')

  @section('contenido')

    <section class="menu-section">
      <a href='{{ route("phones") }}' class="menu-item">Phones</a>
      <a href='{{ route("añadir") }}' class="menu-item">Añadir móviles</a>
      <a href="{{ route('tiendas.crear') }}" class="menu-item">Añadir Tienda</a>
      <a href='{{ route("phones") }}' class="menu-item">Ver móviles</a>
      <a href='{{ route("tiendas.index") }}' class="menu-item">Tiendas</a>
    </section>

    <h2>Inicio</h2>

    <p>CRUD básico para una compañía que distribuye móviles y tiendas</p>

    <img src="https://images.ctfassets.net/63bmaubptoky/ujYI6HcFvv8XYVy5p6A3s/c297dd953a9ff5e0619a03b1d1e64f35/software-de-base-de-datos-gratuito-ES-Capterra-Header.png" alt="Empresa Image" class="company-image">

  @endsection
</body>
</html>
