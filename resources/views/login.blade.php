<!DOCTYPE html>
<html>
<head>
    <title>Login - Examen Mascotas</title>
</head>
<body>

<h2>Login Administrador</h2>

@if(session('error'))
<p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="/login">

    @csrf

    <input type="password" name="password" placeholder="Contraseña" required>

    <button type="submit">Ingresar</button>

</form>

</body>
</html>