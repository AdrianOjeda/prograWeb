<?php
namespace Database\Factories;

use App\Models\Profesor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesorFactory extends Factory
{
    protected $model = Profesor::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'codigo' => $this->faker->unique()->word,
            'user_id' => User::factory()->create()->id,  
        ];
    }
}
