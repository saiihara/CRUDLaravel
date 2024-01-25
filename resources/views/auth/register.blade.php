<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Register</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required autocomplete="new-password">
        </div>
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
        </div>
        <button type="submit">Register</button>
    </form>

</body>
</html>