<?php

/*
|--------------------------------------------------------------------------
| UsuarioController
|--------------------------------------------------------------------------
|
| Este controlador maneja todas las operaciones CRUD del módulo de usuarios.
|
| CRUD significa:
| - Create  → crear usuarios
| - Read    → listar usuarios
| - Update  → actualizar usuarios
| - Delete  → eliminar usuarios
|
| El controlador utiliza el modelo Usuario, el cual representa
| la tabla "usuarios" en la base de datos.
|
| Cada método normalmente está conectado a una ruta definida
| en routes/web.php.
|
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;   // Permite acceder a datos enviados por formularios
use App\Models\Usuario;        // Modelo que representa la tabla "usuarios"

class UsuarioController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Listar usuarios
    |--------------------------------------------------------------------------
    |
    | Este método obtiene todos los registros de la tabla usuarios
    | y los envía a la vista usuarios.index para mostrarlos.
    |
    | Ruta asociada:
    | /usuarios
    |
    */
    public function index()
    {
        // Obtiene todos los usuarios de la base de datos
        $usuarios = Usuario::all();

        // Envía los datos a la vista
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }


    /*
    |--------------------------------------------------------------------------
    | Mostrar formulario de creación
    |--------------------------------------------------------------------------
    |
    | Este método carga la vista con el formulario para crear un nuevo usuario.
    |
    | Ruta asociada:
    | /usuarios/create
    |
    */
    public function create()
    {
        return view('usuarios.create');
    }


    /*
    |--------------------------------------------------------------------------
    | Guardar nuevo usuario
    |--------------------------------------------------------------------------
    |
    | Este método recibe los datos enviados desde el formulario
    | de creación de usuario y los guarda en la base de datos.
    |
    */
    public function store(Request $request)
    {

        // Validación de datos del formulario
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Crear nuevo registro
        |--------------------------------------------------------------------------
        |
        | Se crea una instancia del modelo Usuario y se asignan
        | los valores enviados desde el formulario.
        |
        */

        $usuario = new Usuario();

        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;

        // En este ejercicio la contraseña se guarda en texto plano
        // (solo para fines académicos)
        // En sistemas reales se debe usar bcrypt o hash.
        $usuario->password = $request->password;

        // Guarda el usuario en la base de datos
        $usuario->save();

        // Redirige al listado de usuarios
        return redirect('/usuarios');
    }


    /*
    |--------------------------------------------------------------------------
    | Mostrar formulario de edición
    |--------------------------------------------------------------------------
    |
    | Este método busca un usuario por su ID y carga la vista
    | para poder editar sus datos.
    |
    */
    public function edit($id)
    {
        // Busca el usuario en la base de datos
        $usuario = Usuario::find($id);

        // Envía el usuario a la vista
        return view('usuarios.edit', ['usuario' => $usuario]);
    }


    /*
    |--------------------------------------------------------------------------
    | Actualizar usuario
    |--------------------------------------------------------------------------
    |
    | Este método recibe los datos del formulario de edición
    | y actualiza el registro correspondiente en la base de datos.
    |
    */
    public function update(Request $request, $id)
    {

        // Busca el usuario que se va a actualizar
        $usuario = Usuario::find($id);

        // Actualiza los campos con los datos del formulario
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;

        // En este ejemplo se vuelve a guardar la contraseña directamente
        $usuario->password = $request->password;

        // Guarda los cambios en la base de datos
        $usuario->save();

        // Redirige al listado de usuarios
        return redirect('/usuarios');
    }


    /*
    |--------------------------------------------------------------------------
    | Eliminar usuario
    |--------------------------------------------------------------------------
    |
    | Este método elimina un usuario de la base de datos
    | usando el ID recibido en la ruta.
    |
    */
    public function destroy($id)
    {
        // Busca el usuario
        $usuario = Usuario::find($id);

        // Elimina el registro
        $usuario->delete();

        // Regresa al listado
        return redirect('/usuarios');
    }

}