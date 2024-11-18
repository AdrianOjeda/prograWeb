<?php

namespace Database\Factories;

use App\Models\FormularioClases;
use App\Models\Profesor;
use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormularioClasesFactory extends Factory
{
    protected $model = FormularioClases::class;

    public function definition()
    {
        return [
            'class_name' => $this->faker->word,
            'class_code' => $this->faker->unique()->word,
            'class_description' => $this->faker->sentence,
            'profesor_id' => Profesor::inRandomOrder()->first()->id,
        ];
    }

    
    public function withAlumnos($numAlumnos = 5)
    {
        return $this->afterCreating(function (FormularioClases $formularioClase) use ($numAlumnos) {
            // Attach random alumnos to the class
            $alumnos = Alumno::inRandomOrder()->limit($numAlumnos)->get();
            $formularioClase->alumnos()->attach($alumnos);
        });
    }
}
