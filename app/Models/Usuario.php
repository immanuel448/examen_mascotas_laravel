<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';  // nombre de la tabla
    public $timestamps = false;      // no usamos timestamps automáticos
    protected $fillable = ['nombre', 'email', 'password', 'created_at', 'updated_at', 'deleted_at'];

    // Relación: un usuario tiene muchas mascotas
    public function mascotas()
    {
        return $this->hasMany(Mascota::class, 'usuario_id');
    }
}