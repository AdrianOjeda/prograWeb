<?php

namespace Database\Factories;

use App\Models\Profesor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesorFactory extends Factory
{
    protected $model = Profesor::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido_paterno' => $this->faker->lastName,
            'apellido_materno' => $this->faker->lastName,
            'codigo' => $this->faker->unique()->numerify('PROF####'),
            'edad' => $this->faker->numberBetween(25, 65),
            'direccion' => $this->faker->address,
            'fecha_registro' => $this->faker->dateTimeThisDecade(),
            'materias' => $this->faker->words(3, true),
        ];
    }
}
