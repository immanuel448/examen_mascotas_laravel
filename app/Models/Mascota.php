<?php

/*
|--------------------------------------------------------------------------
| Modelo Mascota
|--------------------------------------------------------------------------
|
| Este modelo representa la tabla "mascotas" de la base de datos.
|
| En Laravel los modelos se utilizan para interactuar con la base
| de datos utilizando el ORM Eloquent.
|
| ORM (Object Relational Mapping) permite trabajar con tablas como
| si fueran objetos de PHP.
|
| Ejemplos:
|
| Mascota::all()       → obtiene todas las mascotas
| Mascota::find(1)     → obtiene una mascota por su ID
| $mascota->save()     → guarda un registro
| $mascota->delete()   → elimina un registro
|
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{

    /*
    |--------------------------------------------------------------------------
    | Tabla asociada al modelo
    |--------------------------------------------------------------------------
    |
    | Por convención Laravel asume que el nombre de la tabla es el plural
    | del modelo. En este caso sería "mascotas", pero aquí se define
    | explícitamente.
    |
    */

    protected $table = 'mascotas';


    /*
    |--------------------------------------------------------------------------
    | Desactivar timestamps automáticos
    |--------------------------------------------------------------------------
    |
    | Laravel por defecto espera que existan las columnas:
    |
    | created_at
    | updated_at
    |
    | Si la tabla no las tiene, se desactiva esta funcionalidad.
    |
    */

    public $timestamps = false;


    /*
    |--------------------------------------------------------------------------
    | Campos asignables masivamente
    |--------------------------------------------------------------------------
    |
    | Define qué campos pueden ser llenados usando asignación masiva.
    |
    | Ejemplo:
    |
    | Mascota::create($request->all());
    |
    | Laravel solo permitirá los campos definidos aquí.
    |
    */

    protected $fillable = [
        'nombre',
        'tipo',
        'edad',
        'usuario_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    /*
    |--------------------------------------------------------------------------
    | Relación con Usuario
    |--------------------------------------------------------------------------
    |
    | Una mascota pertenece a un usuario (su dueño).
    |
    | Relación:
    |
    | mascotas.usuario_id → usuarios.id
    |
    | belongsTo significa que este modelo tiene una clave foránea
    | que apunta a otro modelo.
    |
    | Ejemplo de uso:
    |
    | $mascota->usuario
    |
    | Esto devolverá el usuario dueño de la mascota.
    |
    */

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

}