@extends('layouts.app')

@section('titulo', 'Detalles de Tienda')

@section('contenido')

    <h2>Detalles de Tienda</h2>

    <ul>
        <li><strong>Nombre:</strong> {{ $tienda->nombre }}</li>
        <li><strong>Localización:</strong> {{ $tienda->localizacion }}</li>
        <li><strong>CID:</strong> {{ $tienda->cid }}</li>
        <li><strong>Número de Trabajadores:</strong> {{ $tienda->numero_trabajadores }}</li>
    </ul>

    <div>
        <!-- Enlace para editar -->
        <a class="editar" href="{{ route('tiendas.editar', $tienda->id_tienda) }}">Editar</a>

        <!-- Formulario para eliminar -->
        <form method="post" action="{{ route('tiendas.eliminar', $tienda->id_tienda) }}" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" style="color: red; border: none; background: none; cursor: pointer;">Eliminar</button>
        </form>
    </div>

    <a href="{{ route('tiendas.index') }}">Volver al listado de tiendas</a>

@endsection
