<!DOCTYPE html>
<html>
<head>

    <!--
    |--------------------------------------------------------------------------
    | Título de la página
    |--------------------------------------------------------------------------
    |
    | Se muestra en la pestaña del navegador.
    |
    -->
    <title>Listado de Mascotas</title>

</head>
<body>

    <!--
    |--------------------------------------------------------------------------
    | Título del módulo
    |--------------------------------------------------------------------------
    |
    | Indica que estamos dentro del módulo de gestión de mascotas.
    |
    -->
    <h2>Módulo Mascotas</h2>


    <!--
    |--------------------------------------------------------------------------
    | Navegación
    |--------------------------------------------------------------------------
    |
    | /panel → regresa al panel principal
    | /mascotas/create → abre el formulario para crear una mascota
    |
    -->
    <p>
        <a href="/panel">Volver al Panel</a> |
        <a href="/mascotas/create">Crear Mascota</a>
    </p>


    <!--
    |--------------------------------------------------------------------------
    | Tabla de mascotas
    |--------------------------------------------------------------------------
    |
    | Aquí se mostrarán todas las mascotas registradas.
    | Los datos vienen del controlador:
    |
    | $mascotas = Mascota::all();
    |
    -->
    <table border="1">


        <!--
        |--------------------------------------------------------------------------
        | Encabezados de la tabla
        |--------------------------------------------------------------------------
        -->
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Edad</th>
            <th>Dueño</th>
            <th>Acciones</th>
        </tr>


        <!--
        |--------------------------------------------------------------------------
        | Recorrer mascotas
        |--------------------------------------------------------------------------
        |
        | Blade usa @foreach para recorrer colecciones.
        |
        | $mascotas contiene todos los registros obtenidos
        | desde la base de datos.
        |
        -->

        @foreach($mascotas as $m)

        <tr>

            <!--
            |--------------------------------------------------------------------------
            | Datos de la mascota
            |--------------------------------------------------------------------------
            |
            | {{ }} imprime variables en Blade.
            |
            -->

            <td>{{ $m->nombre }}</td>
            <td>{{ $m->tipo }}</td>
            <td>{{ $m->edad }}</td>


            <!--
            |--------------------------------------------------------------------------
            | Nombre del dueño
            |--------------------------------------------------------------------------
            |
            | $m->usuario utiliza la relación definida en el modelo Mascota:
            |
            | public function usuario()
            | {
            |     return $this->belongsTo(Usuario::class, 'usuario_id');
            | }
            |
            | Esto permite acceder al usuario dueño de la mascota.
            |
            | ?? '' es un operador de seguridad (null coalescing).
            |
            | Si no existe usuario, muestra texto vacío
            | y evita un error.
            |
            -->

            <td>{{ $m->usuario->nombre ?? '' }}</td>


            <!--
            |--------------------------------------------------------------------------
            | Acciones
            |--------------------------------------------------------------------------
            |
            | Editar → abre formulario para modificar mascota
            | Eliminar → ejecuta eliminación de registro
            |
            -->

            <td>

                <a href="/mascotas/edit/{{ $m->id }}">Editar</a> |

                <a href="/mascotas/delete/{{ $m->id }}">Eliminar</a>

            </td>

        </tr>

        @endforeach

    </table>

</body>
</html>