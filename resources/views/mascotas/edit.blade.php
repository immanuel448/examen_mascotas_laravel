<!DOCTYPE html>
<html>
<head>
    <title>Editar Mascota</title>
</head>
<body>
    <h2>Editar Mascota</h2>

    <form method="POST" action="/mascotas/update/{{ $mascota->id }}">
        @csrf
        <p>Nombre: <input type="text" name="nombre" value="{{ $mascota->nombre }}" required></p>
        <p>Tipo: <input type="text" name="tipo" value="{{ $mascota->tipo }}" required></p>
        <p>Edad: <input type="number" name="edad" value="{{ $mascota->edad }}" required></p>
        <p>Dueño:
            <select name="usuario_id" required>
                @foreach($usuarios as $u)
                    <option value="{{ $u->id }}" {{ $mascota->usuario_id == $u->id ? 'selected' : '' }}>
                        {{ $u->nombre }}
                    </option>
                @endforeach
            </select>
        </p>
        <button type="submit">Actualizar</button>
    </form>

    <p><a href="/mascotas">Volver al Listado</a></p>
</body>
</html>