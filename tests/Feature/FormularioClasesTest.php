<?php

namespace Tests\Feature;

use App\Models\FormularioClases;
use App\Models\Profesor;
use App\Models\Alumno;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormularioClasesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_class_can_be_created()
    {
        $profesor = Profesor::factory()->create();

        
        $formularioClase = FormularioClases::create([
            'class_name' => 'Math 101',
            'class_code' => 'MATH101',
            'class_description' => 'Introduction to Math',
            'profesor_id' => $profesor->id,
        ]);

        
        $this->assertDatabaseHas('formulario_clases', [
            'class_name' => 'Math 101',
            'class_code' => 'MATH101',
            'profesor_id' => $profesor->id,
        ]);
    }

    /** @test */
    public function a_class_belongs_to_a_profesor()
    {
        $profesor = Profesor::factory()->create();
        $formularioClase = FormularioClases::factory()->create([
            'profesor_id' => $profesor->id,
        ]);

        
        $this->assertEquals($profesor->id, $formularioClase->profesor->id);
    }

    /** @test */
    public function a_class_has_many_alumnos()
    {
        $formularioClase = FormularioClases::factory()->create();
        $alumnos = Alumno::factory()->count(3)->create(); 

        
        $formularioClase->alumnos()->attach($alumnos);

        
        $this->assertCount(3, $formularioClase->alumnos);
    }

    /** @test */
    public function class_code_is_unique()
    {
        $profesor = Profesor::factory()->create();

        
        FormularioClases::create([
            'class_name' => 'Math 101',
            'class_code' => 'MATH101',
            'class_description' => 'Introduction to Math',
            'profesor_id' => $profesor->id,
        ]);

        
        $this->expectException(\Illuminate\Database\QueryException::class); // Expect a database error due to unique constraint
        FormularioClases::create([
            'class_name' => 'Physics 101',
            'class_code' => 'MATH101', 
            'class_description' => 'Introduction to Physics',
            'profesor_id' => $profesor->id,
        ]);
    }
}
