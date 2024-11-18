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
        'apellido',
        'codigo',
    ];
    protected $casts = [
        
    ];    

    public function clases()
    {
        return $this->hasMany(FormularioClases::class, 'profesor_id');
    }
}


