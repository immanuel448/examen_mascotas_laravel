<!DOCTYPE html>
<html>
<head>

    <!--
    |--------------------------------------------------------------------------
    | Título de la página
    |--------------------------------------------------------------------------
    |
    | Este título aparece en la pestaña del navegador.
    |
    -->
    <title>Panel Principal - Examen Mascotas</title>

</head>
<body>

    <!--
    |--------------------------------------------------------------------------
    | Encabezado del panel
    |--------------------------------------------------------------------------
    |
    | Indica que el usuario ya inició sesión y está dentro
    | del panel administrativo del sistema.
    |
    -->
    <h2>Panel Administrador</h2>


    <!--
    |--------------------------------------------------------------------------
    | Enlace al módulo de usuarios
    |--------------------------------------------------------------------------
    |
    | Este enlace dirige a la ruta /usuarios.
    |
    | En routes/web.php esta ruta normalmente ejecuta:
    |
    | UsuarioController@index
    |
    | Lo que mostrará la lista de usuarios.
    |
    -->
    <p><a href="/usuarios">Módulo de Usuarios</a></p>


    <!--
    |--------------------------------------------------------------------------
    | Enlace al módulo de mascotas
    |--------------------------------------------------------------------------
    |
    | Este enlace dirige a la ruta /mascotas.
    |
    | En routes/web.php esta ruta ejecuta:
    |
    | MascotaController@index
    |
    | Lo que mostrará la lista de mascotas registradas.
    |
    -->
    <p><a href="/mascotas">Módulo de Mascotas</a></p>


    <!--
    |--------------------------------------------------------------------------
    | Cerrar sesión
    |--------------------------------------------------------------------------
    |
    | Este enlace envía al usuario a la ruta /logout.
    |
    | Esa ruta ejecuta:
    |
    | AuthController@logout
    |
    | El controlador elimina la sesión:
    |
    | session()->forget('admin');
    |
    | y redirige nuevamente al login.
    |
    -->
    <p><a href="/logout">Cerrar sesión</a></p>

</body>
</html>