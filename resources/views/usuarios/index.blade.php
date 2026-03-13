<!DOCTYPE html>
<html>
<head>
    <title>Listado de Usuarios</title>
</head>
<body>
    <h2>Módulo Usuarios</h2>

    <p><a href="/panel">Volver al Panel</a> | <a href="/usuarios/create">Crear Usuario</a></p>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        @foreach($usuarios as $u)
        <tr>
            <td>{{ $u->nombre }}</td>
            <td>{{ $u->email }}</td>
            <td>
                <a href="/usuarios/edit/{{ $u->id }}">Editar</a> |
                <a href="/usuarios/delete/{{ $u->id }}">Eliminar</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>