<?php

/*
|--------------------------------------------------------------------------
| MascotaController
|--------------------------------------------------------------------------
|
| Este controlador maneja todas las operaciones CRUD del módulo de mascotas.
|
| CRUD significa:
| - Create   → crear registros
| - Read     → leer/listar registros
| - Update   → actualizar registros
| - Delete   → eliminar registros
|
| En este caso se trabaja con la tabla "mascotas" mediante el modelo Mascota.
| También se usa el modelo Usuario porque cada mascota tiene un dueño
| (relación mediante el campo usuario_id).
|
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;   // Permite recibir datos enviados desde formularios
use App\Models\Mascota;        // Modelo que representa la tabla "mascotas"
use App\Models\Usuario;        // Modelo de usuarios (dueños de las mascotas)

class MascotaController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Listar todas las mascotas
    |--------------------------------------------------------------------------
    |
    | Este método obtiene todos los registros de la tabla mascotas
    | y los envía a la vista mascotas.index para mostrarlos en una tabla.
    |
    | Ruta asociada:
    | /mascotas
    |
    */
    public function index()
    {
        // Obtiene todos los registros de la tabla mascotas
        $mascotas = Mascota::all();

        // Envía los datos a la vista
        return view('mascotas.index', ['mascotas' => $mascotas]);
    }


    /*
    |--------------------------------------------------------------------------
    | Mostrar formulario para crear mascota
    |--------------------------------------------------------------------------
    |
    | Este método carga el formulario para registrar una nueva mascota.
    |
    | También obtiene todos los usuarios porque el formulario necesita
    | un SELECT para elegir al dueño de la mascota.
    |
    */
    public function create()
    {
        // Obtiene todos los usuarios (para el select de dueño)
        $usuarios = Usuario::all();

        // Envía la lista de usuarios a la vista
        return view('mascotas.create', ['usuarios' => $usuarios]);
    }


    /*
    |--------------------------------------------------------------------------
    | Guardar nueva mascota
    |--------------------------------------------------------------------------
    |
    | Este método se ejecuta cuando se envía el formulario de creación.
    | Valida los datos recibidos y luego guarda un nuevo registro
    | en la tabla mascotas.
    |
    */
    public function store(Request $request)
    {

        // Validación de datos del formulario
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'edad' => 'required|integer',
            'usuario_id' => 'required'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Crear nuevo registro
        |--------------------------------------------------------------------------
        |
        | Se crea una nueva instancia del modelo Mascota y se asignan
        | los valores enviados desde el formulario.
        |
        */

        $mascota = new Mascota();

        $mascota->nombre = $request->nombre;
        $mascota->tipo = $request->tipo;
        $mascota->edad = $request->edad;
        $mascota->usuario_id = $request->usuario_id;

        // Guarda el registro en la base de datos
        $mascota->save();

        // Redirige nuevamente al listado de mascotas
        return redirect('/mascotas');
    }


    /*
    |--------------------------------------------------------------------------
    | Mostrar formulario de edición
    |--------------------------------------------------------------------------
    |
    | Este método carga los datos de una mascota específica para editarlos.
    |
    | También se cargan los usuarios para poder cambiar el dueño si es necesario.
    |
    */
    public function edit($id)
    {
        // Busca la mascota por su ID
        $mascota = Mascota::find($id);

        // Obtiene todos los usuarios
        $usuarios = Usuario::all();

        // Envía los datos a la vista de edición
        return view('mascotas.edit', [
            'mascota' => $mascota,
            'usuarios' => $usuarios
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Actualizar mascota
    |--------------------------------------------------------------------------
    |
    | Este método recibe los datos del formulario de edición
    | y actualiza el registro correspondiente en la base de datos.
    |
    */
    public function update(Request $request, $id)
    {
        // Busca la mascota a actualizar
        $mascota = Mascota::find($id);

        // Actualiza los campos con los datos del formulario
        $mascota->nombre = $request->nombre;
        $mascota->tipo = $request->tipo;
        $mascota->edad = $request->edad;
        $mascota->usuario_id = $request->usuario_id;

        // Guarda los cambios
        $mascota->save();

        // Regresa al listado de mascotas
        return redirect('/mascotas');
    }


    /*
    |--------------------------------------------------------------------------
    | Eliminar mascota
    |--------------------------------------------------------------------------
    |
    | Este método elimina un registro de la tabla mascotas
    | usando el ID enviado en la ruta.
    |
    */
    public function destroy($id)
    {
        // Busca la mascota
        $mascota = Mascota::find($id);

        // Elimina el registro
        $mascota->delete();

        // Redirige al listado
        return redirect('/mascotas');
    }
}