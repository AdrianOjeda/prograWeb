<?php
namespace Database\Factories;

use App\Models\FormularioClases;
use App\Models\Profesor;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormularioClasesFactory extends Factory
{
    protected $model = FormularioClases::class;

    public function definition()
    {
        return [
            'class_name' => $this->faker->word,
            'class_code' => $this->faker->unique()->lexify('CLASS-????'),
            'class_description' => $this->faker->paragraph,
            'profesor_id' => Profesor::factory(), 
        ];
    }
}
