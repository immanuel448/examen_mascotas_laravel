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
    <title>Editar Mascota</title>

</head>
<body>

    <!--
    |--------------------------------------------------------------------------
    | Título del formulario
    |--------------------------------------------------------------------------
    |
    | Indica que se está editando una mascota existente.
    |
    -->
    <h2>Editar Mascota</h2>


    <!--
    |--------------------------------------------------------------------------
    | Formulario de actualización
    |--------------------------------------------------------------------------
    |
    | method="POST"
    | Envia los datos al servidor.
    |
    | action="/mascotas/update/{{ $mascota->id }}"
    | La URL incluye el ID de la mascota que se va a actualizar.
    |
    | Esta ruta normalmente ejecuta:
    |
    | MascotaController@update
    |
    -->

    <form method="POST" action="/mascotas/update/{{ $mascota->id }}">


        <!--
        |--------------------------------------------------------------------------
        | Token CSRF
        |--------------------------------------------------------------------------
        |
        | Protección contra ataques CSRF.
        | Laravel exige este token en todos los formularios POST.
        |
        -->

        @csrf


        <!--
        |--------------------------------------------------------------------------
        | Campo nombre
        |--------------------------------------------------------------------------
        |
        | value="{{ $mascota->nombre }}"
        | Muestra el nombre actual de la mascota para poder editarlo.
        |
        -->

        <p>Nombre: 
            <input type="text" name="nombre" value="{{ $mascota->nombre }}" required>
        </p>


        <!--
        |--------------------------------------------------------------------------
        | Campo tipo
        |--------------------------------------------------------------------------
        |
        | Tipo de mascota (perro, gato, etc).
        |
        -->

        <p>Tipo: 
            <input type="text" name="tipo" value="{{ $mascota->tipo }}" required>
        </p>


        <!--
        |--------------------------------------------------------------------------
        | Campo edad
        |--------------------------------------------------------------------------
        |
        | type="number" permite solo números.
        |
        -->

        <p>Edad: 
            <input type="number" name="edad" value="{{ $mascota->edad }}" required>
        </p>


        <!--
        |--------------------------------------------------------------------------
        | Selección de dueño (usuario)
        |--------------------------------------------------------------------------
        |
        | Aquí se muestran todos los usuarios disponibles.
        |
        | $usuarios viene desde el controlador:
        |
        | $usuarios = Usuario::all();
        |
        | foreach recorre cada usuario y crea una opción del select.
        |
        -->

        <p>Dueño:

            <select name="usuario_id" required>


                <!--
                |--------------------------------------------------------------------------
                | Recorrer usuarios
                |--------------------------------------------------------------------------
                |
                | Blade permite usar ciclos como este para generar HTML.
                |
                -->

                @foreach($usuarios as $u)


                    <!--
                    |--------------------------------------------------------------------------
                    | Opción del select
                    |--------------------------------------------------------------------------
                    |
                    | value="{{ $u->id }}"
                    | El valor enviado será el ID del usuario.
                    |
                    | {{ $u->nombre }}
                    | Lo que se muestra al usuario.
                    |
                    | Condición:
                    |
                    | {{ $mascota->usuario_id == $u->id ? 'selected' : '' }}
                    |
                    | Si el usuario es el dueño actual de la mascota,
                    | la opción aparecerá seleccionada.
                    |
                    -->

                    <option value="{{ $u->id }}" {{ $mascota->usuario_id == $u->id ? 'selected' : '' }}>
                        {{ $u->nombre }}
                    </option>

                @endforeach

            </select>

        </p>


        <!--
        |--------------------------------------------------------------------------
        | Botón de actualización
        |--------------------------------------------------------------------------
        |
        | Envía el formulario al controlador para guardar cambios.
        |
        -->

        <button type="submit">Actualizar</button>

    </form>


    <!--
    |--------------------------------------------------------------------------
    | Link para regresar al listado
    |--------------------------------------------------------------------------
    |
    | Redirige nuevamente a la lista de mascotas.
    |
    -->

    <p><a href="/mascotas">Volver al Listado</a></p>

</body>
</html>