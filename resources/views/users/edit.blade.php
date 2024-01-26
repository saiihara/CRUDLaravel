<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $user->name }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>

        <label for="role">Role:</label>
        <select name="role" required>
            <option value="administrador" {{ $user->role === 'administrador' ? 'selected' : '' }}>Administrador</option>
            <option value="Editor" {{ $user->role === 'Editor' ? 'selected' : '' }}>Editor</option>
            <option value="El que añade" {{ $user->role === 'Añadidor' ? 'selected' : '' }}>Añadidor</option>
            <option value="Invitado" {{ $user->role === 'Invitado' ? 'selected' : '' }}>Invitado</option>
        </select>

        <button type="submit">Save Changes</button>
    </form>
</body>
</html>