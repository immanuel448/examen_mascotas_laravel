<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
</head>
<body>
    <h2>Crear Usuario</h2>

    <form method="POST" action="/usuarios/store">
        <p>Nombre: <input type="text" name="nombre" required></p>
        <p>Email: <input type="email" name="email" required></p>
        <p>Contraseña: <input type="password" name="password" required></p>
        <button type="submit">Crear</button>
    </form>

    <p><a href="/usuarios">Volver al Listado</a></p>
</body>
</html>