<?php

namespace Tests\Feature;

use App\Models\FormularioClases;
use App\Models\Profesor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormularioClasesTest extends TestCase
{
    use RefreshDatabase; 

    public function test_index_shows_clases_and_returns_200()
    {
        // Crea un usuario y lo autentica
        $user = User::factory()->create();
        $this->actingAs($user);

        // Crea un profesor
        $profesor = Profesor::factory()->create();

        // Crea 5 clases asociadas al profesor
        FormularioClases::factory()->count(5)->create(['profesor_id' => $profesor->id]);

        // Realiza la solicitud a la ruta 'clases.index'
        $response = $this->get(route('clases.index'));

        // Verifica que la respuesta sea 200, y que contenga las clases
        $response->assertStatus(200);
        $response->assertViewHas('clases');
        $response->assertSee('Clases');
    }

    public function test_store_creates_clase_and_redirects()
    {
        // Crea un usuario y lo autentica
        $user = User::factory()->create();
        $this->actingAs($user);

        // Crea un profesor
        $profesor = Profesor::factory()->create();

        // Datos para crear una nueva clase
        $data = [
            'class_name' => 'Math 101',
            'class_code' => 'MATH101',
            'class_description' => 'Introduction to Math',
            'profesor_id' => $profesor->id, 
        ];

        // Realiza la solicitud para crear una nueva clase
        $response = $this->post(route('clases.store'), $data);

        // Verifica que la clase haya sido creada en la base de datos
        $this->assertDatabaseHas('formulario_clases', [
            'class_name' => 'Math 101',
            'class_code' => 'MATH101',
        ]);

        // Verifica que la respuesta redirija correctamente
        $response->assertRedirect(route('clases.index'));
        $response->assertSessionHas('success', 'Class created successfully.');
    }

    public function test_store_fails_with_invalid_data()
    {
        // Crea un usuario y lo autentica
        $user = User::factory()->create();
        $this->actingAs($user);

        // Datos inválidos para crear una clase
        $data = [
            'class_name' => '',
            'class_code' => '',
            'profesor_id' => 9999,  
        ];

        // Realiza la solicitud para crear la clase con datos inválidos
        $response = $this->post(route('clases.store'), $data);

        // Verifica que se hayan mostrado los errores de validación
        $response->assertSessionHasErrors(['class_name', 'class_code', 'profesor_id']);
        $this->assertDatabaseMissing('formulario_clases', [
            'class_name' => '',  
        ]);
    }

    public function test_destroy_deletes_clase_and_redirects()
    {
        // Crea un usuario y lo autentica
        $user = User::factory()->create();
        $this->actingAs($user);

        // Crea un profesor y una clase asociada
        $profesor = Profesor::factory()->create();
        $clase = FormularioClases::factory()->create(['profesor_id' => $profesor->id]);

        // Realiza la solicitud para eliminar la clase
        $response = $this->delete(route('clases.destroy', $clase->id));

        // Verifica que la clase haya sido eliminada
        $this->assertDatabaseMissing('formulario_clases', ['id' => $clase->id]);

        // Verifica que la respuesta redirija correctamente
        $response->assertRedirect(route('clases.index'));
        $response->assertSessionHas('success', 'Class deleted successfully.');
    }
}
