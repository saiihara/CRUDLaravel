<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        <input type="password" name="password" required autocomplete="current-password">
        <button type="submit">Login</button>
    </form>

    <p>No estás registrado? <a href="{{ route('register') }}">Regístrate</a></p>
</body>
</html>