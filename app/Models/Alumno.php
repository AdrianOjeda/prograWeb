<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'codigo'];

    public function clases()
    {
        return $this->belongsToMany(FormularioClases::class, 'alumno_clase', 'alumno_id', 'formulario_clase_id');
    }
}
