<!DOCTYPE html>
<html>
<head>
    <title>Listado de Mascotas</title>
</head>
<body>
    <h2>Módulo Mascotas</h2>

    <p><a href="/panel">Volver al Panel</a> | <a href="/mascotas/create">Crear Mascota</a></p>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Edad</th>
            <th>Dueño</th>
            <th>Acciones</th>
        </tr>
        @foreach($mascotas as $m)
        <tr>
            <td>{{ $m->nombre }}</td>
            <td>{{ $m->tipo }}</td>
            <td>{{ $m->edad }}</td>
            <td>{{ $m->usuario->nombre ?? '' }}</td>
            <td>
                <a href="/mascotas/edit/{{ $m->id }}">Editar</a> |
                <a href="/mascotas/delete/{{ $m->id }}">Eliminar</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>