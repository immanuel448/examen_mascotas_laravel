<!DOCTYPE html>
<html>
<head>

    <!--
    |--------------------------------------------------------------------------
    | Título de la página
    |--------------------------------------------------------------------------
    |
    | Aparece en la pestaña del navegador.
    |
    -->
    <title>Crear Mascota</title>

</head>
<body>

    <!--
    |--------------------------------------------------------------------------
    | Título del formulario
    |--------------------------------------------------------------------------
    |
    | Indica que estamos en la pantalla para registrar
    | una nueva mascota.
    |
    -->
    <h2>Crear Mascota</h2>


    <!--
    |--------------------------------------------------------------------------
    | Formulario de creación
    |--------------------------------------------------------------------------
    |
    | method="POST"
    | Envia los datos al servidor.
    |
    | action="/mascotas/store"
    | Esta ruta ejecuta en el controlador:
    |
    | MascotaController@store
    |
    | donde se guarda la nueva mascota en la base de datos.
    |
    -->

    <form method="POST" action="/mascotas/store">


        <!--
        |--------------------------------------------------------------------------
        | Token CSRF
        |--------------------------------------------------------------------------
        |
        | Protección obligatoria de Laravel contra ataques CSRF.
        | Genera un campo oculto con un token de seguridad.
        |
        -->

        @csrf


        <!--
        |--------------------------------------------------------------------------
        | Campo nombre
        |--------------------------------------------------------------------------
        |
        | Nombre de la mascota.
        |
        -->

        <p>
            Nombre:
            <input type="text" name="nombre" required>
        </p>


        <!--
        |--------------------------------------------------------------------------
        | Campo tipo
        |--------------------------------------------------------------------------
        |
        | Tipo de mascota (perro, gato, etc).
        |
        -->

        <p>
            Tipo:
            <input type="text" name="tipo" required>
        </p>


        <!--
        |--------------------------------------------------------------------------
        | Campo edad
        |--------------------------------------------------------------------------
        |
        | type="number" limita la entrada a números.
        |
        -->

        <p>
            Edad:
            <input type="number" name="edad" required>
        </p>


        <!--
        |--------------------------------------------------------------------------
        | Selección del dueño
        |--------------------------------------------------------------------------
        |
        | Este select muestra todos los usuarios disponibles
        | para asignarles una mascota.
        |
        | $usuarios viene del controlador:
        |
        | $usuarios = Usuario::all();
        |
        -->

        <p>
            Dueño:

            <select name="usuario_id" required>


                <!--
                |--------------------------------------------------------------------------
                | Recorrer usuarios
                |--------------------------------------------------------------------------
                |
                | @foreach es una estructura de Blade para recorrer
                | colecciones de datos.
                |
                -->

                @foreach($usuarios as $u)


                    <!--
                    |--------------------------------------------------------------------------
                    | Opción del select
                    |--------------------------------------------------------------------------
                    |
                    | value="{{ $u->id }}"
                    | Este valor será enviado al controlador.
                    |
                    | {{ $u->nombre }}
                    | Es el texto que se muestra en pantalla.
                    |
                    -->

                    <option value="{{ $u->id }}">
                        {{ $u->nombre }}
                    </option>

                @endforeach

            </select>

        </p>


        <!--
        |--------------------------------------------------------------------------
        | Botón de envío
        |--------------------------------------------------------------------------
        |
        | Envía el formulario al controlador para guardar
        | la nueva mascota.
        |
        -->

        <button type="submit">Crear</button>

    </form>


    <!--
    |--------------------------------------------------------------------------
    | Link para regresar al listado
    |--------------------------------------------------------------------------
    |
    | Permite volver a la lista de mascotas.
    |
    -->

    <p>
        <a href="/mascotas">Volver al Listado</a>
    </p>

</body>
</html>