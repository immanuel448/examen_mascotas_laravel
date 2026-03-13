<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\Usuario;

class MascotaController extends Controller
{
    // Listar todas las mascotas
    public function index()
    {
        $mascotas = Mascota::all();
        return view('mascotas.index', ['mascotas' => $mascotas]);
    }

    // Mostrar formulario de creación
    public function create()
    {
        $usuarios = Usuario::all(); // Para el select de dueño
        return view('mascotas.create', ['usuarios' => $usuarios]);
    }

    // Guardar nueva mascota
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'edad' => 'required|integer',
            'usuario_id' => 'required'
        ]);

        $mascota = new Mascota();
        $mascota->nombre = $request->nombre;
        $mascota->tipo = $request->tipo;
        $mascota->edad = $request->edad;
        $mascota->usuario_id = $request->usuario_id;
        $mascota->save();

        return redirect('/mascotas');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $mascota = Mascota::find($id);
        $usuarios = Usuario::all(); // Para el select de dueño
        return view('mascotas.edit', ['mascota' => $mascota, 'usuarios' => $usuarios]);
    }

    // Actualizar mascota
    public function update(Request $request, $id)
    {
        $mascota = Mascota::find($id);
        $mascota->nombre = $request->nombre;
        $mascota->tipo = $request->tipo;
        $mascota->edad = $request->edad;
        $mascota->usuario_id = $request->usuario_id;
        $mascota->save();

        return redirect('/mascotas');
    }

    // Eliminar mascota
    public function destroy($id)
    {
        $mascota = Mascota::find($id);
        $mascota->delete();
        return redirect('/mascotas');
    }
}