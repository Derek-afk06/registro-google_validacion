<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>

    <h1>Registro de Estudiante</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ url('/register') }}" method="POST">
        @csrf

        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Correo:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="password_confirmation">Confirmar Contraseña:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required><br>

        <label for="career_id">Carrera:</label>
        <select name="career_id" id="career_id" required>
            @foreach($careers as $career)
                <option value="{{ $career->id }}">{{ $career->name }}</option>
            @endforeach
        </select><br>

        <label for="terms_accepted">
            <input type="checkbox" name="terms_accepted" id="terms_accepted" required>
            Acepto los términos y condiciones
        </label><br>

        <button type="submit">Registrar</button>
    </form>

</body>
</html>