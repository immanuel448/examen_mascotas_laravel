<?php

/*
|--------------------------------------------------------------------------
| AuthController
|--------------------------------------------------------------------------
|
| Este controlador se encarga de la autenticación básica del sistema.
|
| Funciones principales:
| - Mostrar la vista de login
| - Validar la contraseña ingresada
| - Crear una sesión si el login es correcto
| - Cerrar la sesión (logout)
|
| En este ejemplo se usa una autenticación muy simple:
| - Solo se verifica una contraseña
| - Se toma el primer usuario de la tabla "usuarios"
| - Si coincide la contraseña se guarda una variable de sesión "admin"
|
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;   // Permite acceder a los datos enviados en formularios (POST/GET)
use App\Models\Usuario;       // Modelo que representa la tabla "usuarios" en la base de datos

class AuthController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Mostrar formulario de login
    |--------------------------------------------------------------------------
    |
    | Este método simplemente carga la vista del login.
    | Se ejecuta cuando el usuario entra a la ruta:
    |
    | /login
    |
    */
    public function showLogin()
    {
        return view('login');
    }


    /*
    |--------------------------------------------------------------------------
    | Procesar login
    |--------------------------------------------------------------------------
    |
    | Este método se ejecuta cuando el usuario envía el formulario del login.
    | Aquí se valida la contraseña y se verifica contra la base de datos.
    |
    */
    public function login(Request $request)
    {

        // Validación: Laravel verifica que el campo password venga en el formulario
        $request->validate([
            'password' => 'required'
        ]);

        // Obtiene el primer registro de la tabla usuarios
        // (en este ejemplo se asume que el primer usuario es el administrador)
        $admin = Usuario::first();

        /*
        |--------------------------------------------------------------------------
        | Verificación de contraseña
        |--------------------------------------------------------------------------
        |
        | Se compara la contraseña ingresada en el formulario con la que está
        | almacenada en la base de datos.
        |
        | IMPORTANTE:
        | Aquí se compara en texto plano solo para fines del ejercicio.
        | En sistemas reales se usaría password_hash o bcrypt.
        |
        */

        if ($admin && $request->password === $admin->password) {

            // Se crea una variable de sesión llamada "admin"
            // Esto indica que el usuario ya está autenticado
            session(['admin' => true]);

            // Redirige al panel principal
            return redirect('/panel');

        } else {

            /*
            |--------------------------------------------------------------------------
            | Login incorrecto
            |--------------------------------------------------------------------------
            |
            | Si la contraseña no coincide:
            | - regresa a la página anterior (login)
            | - envía un mensaje de error a la sesión
            |
            | Ese mensaje luego se puede mostrar en la vista con:
            | session('error')
            |
            */

            return back()->with('error', 'Contraseña incorrecta');

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    |
    | Este método elimina la variable de sesión "admin",
    | lo que significa que el usuario deja de estar autenticado.
    |
    | Después redirige nuevamente al login.
    |
    */
    public function logout()
    {

        // Elimina la variable de sesión
        session()->forget('admin');

        // Redirige al login
        return redirect('/login');

    }
}