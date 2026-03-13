<?php

/*
|--------------------------------------------------------------------------
| Modelo Usuario
|--------------------------------------------------------------------------
|
| Este modelo representa la tabla "usuarios" en la base de datos.
|
| En Laravel los modelos permiten trabajar con las tablas utilizando
| objetos de PHP gracias al ORM Eloquent.
|
| Ejemplos de uso:
|
| Usuario::all()        → obtiene todos los usuarios
| Usuario::find(1)      → obtiene un usuario por su ID
| $usuario->save()      → guarda cambios en la base de datos
| $usuario->delete()    → elimina un registro
|
| También define las relaciones entre tablas.
|
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    /*
    |--------------------------------------------------------------------------
    | Tabla asociada al modelo
    |--------------------------------------------------------------------------
    |
    | Laravel por convención usaría "usuarios" automáticamente
    | (plural del modelo Usuario), pero aquí se especifica explícitamente.
    |
    */

    protected $table = 'usuarios';


    /*
    |--------------------------------------------------------------------------
    | Desactivar timestamps automáticos
    |--------------------------------------------------------------------------
    |
    | Laravel normalmente maneja automáticamente estas columnas:
    |
    | created_at
    | updated_at
    |
    | Si la tabla no las usa o se manejan manualmente, se desactiva
    | esta funcionalidad.
    |
    */

    public $timestamps = false;


    /*
    |--------------------------------------------------------------------------
    | Campos asignables masivamente
    |--------------------------------------------------------------------------
    |
    | Define qué columnas pueden ser llenadas mediante asignación masiva.
    |
    | Ejemplo:
    |
    | Usuario::create($request->all());
    |
    | Solo los campos definidos aquí podrán ser asignados.
    |
    */

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    /*
    |--------------------------------------------------------------------------
    | Relación con Mascotas
    |--------------------------------------------------------------------------
    |
    | Un usuario puede tener muchas mascotas.
    |
    | Relación en base de datos:
    |
    | usuarios.id → mascotas.usuario_id
    |
    | hasMany indica que un registro de usuarios puede estar relacionado
    | con múltiples registros en la tabla mascotas.
    |
    | Ejemplo de uso:
    |
    | $usuario->mascotas
    |
    | Esto devolverá todas las mascotas que pertenecen a ese usuario.
    |
    */

    public function mascotas()
    {
        return $this->hasMany(Mascota::class, 'usuario_id');
    }

}