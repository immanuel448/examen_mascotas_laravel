<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class AuthController extends Controller
{
    // Mostrar login
    public function showLogin()
    {
        return view('login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        $admin = Usuario::first(); // Solo un usuario administrador

        // Comparación simple (sin Hash)
        if ($admin && $request->password === $admin->password) {
            // Guardar login en sesión manual
            $_SESSION['admin'] = true;
            return redirect('/panel');
        } else {
            return back()->with('error', 'Contraseña incorrecta');
        }
    }

    // Logout
    public function logout()
    {
        unset($_SESSION['admin']);
        return redirect('/login');
    }
}