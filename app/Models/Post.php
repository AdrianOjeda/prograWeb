<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'profesor_id',
        'title',
        'content',
    ];

    
    public function clase()
    {
        return $this->belongsTo(FormularioClases::class, 'class_id');
    }

   
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }
}
