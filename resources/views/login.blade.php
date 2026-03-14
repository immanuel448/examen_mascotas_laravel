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
    <title>Login - Examen Mascotas</title>

</head>
<body>

<!--
|--------------------------------------------------------------------------
| Encabezado de la página
|--------------------------------------------------------------------------
|
| Texto que indica al usuario que está en la pantalla de login.
|
-->
<h2>Login Administrador</h2>


<!--
|--------------------------------------------------------------------------
| Mostrar mensaje de error
|--------------------------------------------------------------------------
|
| session('error') obtiene un valor almacenado en la sesión.
|
| En el AuthController se envía este mensaje cuando
| la contraseña es incorrecta:
|
| return back()->with('error', 'Contraseña incorrecta');
|
| Si existe ese valor en la sesión se muestra el mensaje.
|
-->

@if(session('error'))
<p style="color:red">{{ session('error') }}</p>
@endif


<!--
|--------------------------------------------------------------------------
| Formulario de login
|--------------------------------------------------------------------------
|
| method="POST"
| El formulario enviará los datos mediante POST a la ruta /login
|
| action="/login"
| Esta ruta está definida en routes/web.php y ejecuta:
|
| AuthController@login
|
-->

<form method="POST" action="/login">


    <!--
    |--------------------------------------------------------------------------
    | Token CSRF (seguridad)
    |--------------------------------------------------------------------------
    |
    | Laravel exige un token CSRF para todos los formularios POST
    | para evitar ataques de tipo Cross Site Request Forgery.
    |
    | La directiva Blade @csrf genera un campo oculto con ese token.
    |
    -->

    @csrf


    <!--
    |--------------------------------------------------------------------------
    | Campo de contraseña
    |--------------------------------------------------------------------------
    |
    | El usuario escribe la contraseña del administrador.
    | Este valor se enviará al controlador.
    |
    -->

    <input type="password" name="password" placeholder="Contraseña" required>


    <!--
    |--------------------------------------------------------------------------
    | Botón de envío
    |--------------------------------------------------------------------------
    |
    | Cuando se presiona, el formulario se envía al controlador
    | para validar la contraseña.
    |
    -->

    <button type="submit">Ingresar</button>

</form>

</body>
</html>