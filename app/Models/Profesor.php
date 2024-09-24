<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model // Cambiado a 'Profesor'
{
    use HasFactory;

    protected $table = 'profesores';
    protected $fillable = ['nombre', 'fecha', 'materia']; // Corregido a 'fillable'
}
