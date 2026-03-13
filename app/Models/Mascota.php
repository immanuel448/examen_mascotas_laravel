<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $table = 'mascotas';
    public $timestamps = false;
    protected $fillable = ['nombre', 'tipo', 'edad', 'usuario_id', 'created_at', 'updated_at', 'deleted_at'];

    // Relación: una mascota pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}