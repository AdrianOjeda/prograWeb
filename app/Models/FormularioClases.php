<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioClases extends Model
{
    use HasFactory;
    protected $fillable = ['class_name', 'class_code', 'class_description', 'profesor_id'];

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumno_clase', 'formulario_clase_id', 'alumno_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'class_id');
    }
}
