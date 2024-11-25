<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\FormularioClases;
use App\Models\Profesor;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'class_id' => FormularioClases::factory(),  
            'profesor_id' => Profesor::factory(), 
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'file_path' => $this->faker->word . '.pdf', 
        ];
    }
}
