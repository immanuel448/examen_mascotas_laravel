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

        $admin = Usuario::first();

        if ($admin && $request->password === $admin->password) {

            session(['admin' => true]);

            return redirect('/panel');

        } else {

            return back()->with('error', 'Contraseña incorrecta');

        }

    }

    // Logout
    public function logout()
    {

        session()->forget('admin');

        return redirect('/login');

    }
}