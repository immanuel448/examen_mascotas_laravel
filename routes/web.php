<?php

/*
|--------------------------------------------------------------------------
| Archivo de rutas web
|--------------------------------------------------------------------------
|
| Este archivo define todas las rutas accesibles desde el navegador.
|
| Una ruta conecta:
|
| URL → Controlador → Vista / Acción
|
| Ejemplo:
|
| /login → AuthController → showLogin() → vista login
|
*/

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Importación de controladores
|--------------------------------------------------------------------------
|
| Estos controladores se usarán para manejar las rutas.
|
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MascotaController;


/*
|--------------------------------------------------------------------------
| Rutas de Login
|--------------------------------------------------------------------------
|
| GET /login
| Muestra el formulario de login
|
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');


/*
|--------------------------------------------------------------------------
| Procesar Login
|--------------------------------------------------------------------------
|
| POST /login
| Recibe la contraseña enviada desde el formulario
| y ejecuta la función login() del controlador.
|
*/

Route::post('/login', [AuthController::class, 'login']);


/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
|
| GET /logout
| Ejecuta logout() que elimina la sesión del administrador.
|
*/

Route::get('/logout', [AuthController::class, 'logout']);


/*
|--------------------------------------------------------------------------
| Panel principal
|--------------------------------------------------------------------------
|
| /panel muestra el panel de administración.
|
| Antes de mostrar la vista revisa si existe la sesión:
|
| session('admin')
|
| Si no existe, redirige al login.
|
*/

Route::get('/panel', function () {

    // Verifica si el administrador inició sesión
    if (!session('admin')) {

        // Si no hay sesión, redirige al login
        return redirect('/login');

    }

    // Si hay sesión, muestra el panel
    return view('panel');

});


/*
|--------------------------------------------------------------------------
| CRUD de Usuarios
|--------------------------------------------------------------------------
|
| prefix('usuarios') agrupa todas las rutas que empiezan con:
|
| /usuarios
|
| Esto evita repetir la misma palabra en cada ruta.
|
*/

Route::prefix('usuarios')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | Listar usuarios
    |--------------------------------------------------------------------------
    |
    | URL:
    | /usuarios
    |
    | Ejecuta:
    | UsuarioController@index
    |
    */

    Route::get('/', [UsuarioController::class, 'index']);


    /*
    |--------------------------------------------------------------------------
    | Formulario crear usuario
    |--------------------------------------------------------------------------
    |
    | /usuarios/create
    |
    */

    Route::get('/create', [UsuarioController::class, 'create']);


    /*
    |--------------------------------------------------------------------------
    | Guardar usuario
    |--------------------------------------------------------------------------
    |
    | /usuarios/store
    |
    */

    Route::post('/store', [UsuarioController::class, 'store']);


    /*
    |--------------------------------------------------------------------------
    | Formulario editar usuario
    |--------------------------------------------------------------------------
    |
    | /usuarios/edit/{id}
    |
    | {id} es un parámetro dinámico de la URL.
    |
    */

    Route::get('/edit/{id}', [UsuarioController::class, 'edit']);


    /*
    |--------------------------------------------------------------------------
    | Actualizar usuario
    |--------------------------------------------------------------------------
    |
    | /usuarios/update/{id}
    |
    */

    Route::post('/update/{id}', [UsuarioController::class, 'update']);


    /*
    |--------------------------------------------------------------------------
    | Eliminar usuario
    |--------------------------------------------------------------------------
    |
    | /usuarios/delete/{id}
    |
    */

    Route::get('/delete/{id}', [UsuarioController::class, 'destroy']);

});


/*
|--------------------------------------------------------------------------
| CRUD de Mascotas
|--------------------------------------------------------------------------
|
| Funciona igual que el módulo de usuarios.
|
*/

Route::prefix('mascotas')->group(function () {

    // Listar mascotas
    Route::get('/', [MascotaController::class, 'index']);

    // Formulario crear mascota
    Route::get('/create', [MascotaController::class, 'create']);

    // Guardar mascota
    Route::post('/store', [MascotaController::class, 'store']);

    // Formulario editar mascota
    Route::get('/edit/{id}', [MascotaController::class, 'edit']);

    // Actualizar mascota
    Route::post('/update/{id}', [MascotaController::class, 'update']);

    // Eliminar mascota
    Route::get('/delete/{id}', [MascotaController::class, 'destroy']);

});


/*
|--------------------------------------------------------------------------
| Ruta raíz del sitio
|--------------------------------------------------------------------------
|
| Cuando alguien entra a:
|
| http://localhost/
|
| se redirige automáticamente al login.
|
*/

Route::get('/', function() {
    return redirect('/login');
});