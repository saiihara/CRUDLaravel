

@extends('layouts.app')

@section('content')
    <div class="login-container">
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <label for="username">Usuario:</label>
            <input type="text" name="username" required>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
@endsection
