<!DOCTYPE html>
<html>
<head>
    <title>Crear Mascota</title>
</head>
<body>
    <h2>Crear Mascota</h2>

    <form method="POST" action="/mascotas/store">
        @csrf
        <p>Nombre: <input type="text" name="nombre" required></p>
        <p>Tipo: <input type="text" name="tipo" required></p>
        <p>Edad: <input type="number" name="edad" required></p>
        <p>Dueño:
            <select name="usuario_id" required>
                @foreach($usuarios as $u)
                    <option value="{{ $u->id }}">{{ $u->nombre }}</option>
                @endforeach
            </select>
        </p>
        <button type="submit">Crear</button>
    </form>

    <p><a href="/mascotas">Volver al Listado</a></p>
</body>
</html>