<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model 
{
    use HasFactory;

    protected $table = 'profesores';
    protected $fillable = [
        'nombre', 
        'apellido_paterno', 
        'apellido_materno',
        'codigo',
        'edad',
        'direccion',
        'fecha_registro',
        'materias'
    ];
    protected $casts = [
        'fecha_registro' => 'datetime',
    ];    
}
