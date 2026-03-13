<!DOCTYPE html>
<html>
<head>
<title>Editar Usuario</title>
</head>
<body>

<h2>Editar Usuario</h2>

<form method="POST" action="/usuarios/update/{{ $usuario->id }}">

@csrf

<p>Nombre: <input type="text" name="nombre" value="{{ $usuario->nombre }}" required></p>

<p>Email: <input type="email" name="email" value="{{ $usuario->email }}" required></p>

<p>Contraseña: <input type="password" name="password" value="{{ $usuario->password }}" required></p>

<button type="submit">Actualizar</button>

</form>

<p><a href="/usuarios">Volver al Listado</a></p>

</body>
</html>