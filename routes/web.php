<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MascotaController;

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::get('/logout', [AuthController::class, 'logout']);

// Panel principal
Route::get('/panel', function () {

    if (!session('admin')) {
        return redirect('/login');
    }

    return view('panel');

});

// CRUD Usuarios
Route::prefix('usuarios')->group(function () {

    Route::get('/', [UsuarioController::class, 'index']);

    Route::get('/create', [UsuarioController::class, 'create']);

    Route::post('/store', [UsuarioController::class, 'store']);

    Route::get('/edit/{id}', [UsuarioController::class, 'edit']);

    Route::post('/update/{id}', [UsuarioController::class, 'update']);

    Route::get('/delete/{id}', [UsuarioController::class, 'destroy']);

});

// CRUD Mascotas
Route::prefix('mascotas')->group(function () {

    Route::get('/', [MascotaController::class, 'index']);

    Route::get('/create', [MascotaController::class, 'create']);

    Route::post('/store', [MascotaController::class, 'store']);

    Route::get('/edit/{id}', [MascotaController::class, 'edit']);

    Route::post('/update/{id}', [MascotaController::class, 'update']);

    Route::get('/delete/{id}', [MascotaController::class, 'destroy']);

});

// raíz → login
Route::get('/', function() {
    return redirect('/login');
});