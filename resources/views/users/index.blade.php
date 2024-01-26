<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@extends('layouts.app')


@section('contenido')

<section class="menu-section">
    <nav>
        <a href='{{ route("principal") }}' class="menu-item">Inicio</a>
        <a href='{{ route("phones") }}' class="menu-item">Phones</a>
        <a href='{{ route("phones") }}' class="menu-item">Ver móviles</a>
        <a href='{{ route("tiendas.index") }}' class="menu-item">Ver Tiendas</a>
        

        @if (session('role') && (session('role') === 'administrador' || session('role') === 'editor'))
            <a href='{{ route("añadir") }}' class="menu-item">Añadir móviles</a>
            <a href='{{ route("tiendas.crear") }}' class="menu-item">Añadir Tienda</a>
        @endif

        @if (session('role') && (session('role') === 'administrador'))
            <a href='{{ route("users.index") }}' class="menu-item">Ver usuarios</a>
            <a href='{{ route("log.log") }} ' class="menu-item">Ver logs</a>
        @endif
    </nav>

    <!-- Display logout or login links -->
    @if (session()->has('name'))
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-sign-out" style="color: white"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
     
    @else
        <a href="{{ route('login') }}">
            <i class="fa-solid fa-user" style="color: white"></i>
        </a>
    @endif
</section>

    <h1>Lista de Usuarios</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td> 
                <td>
                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

</body>
</html>