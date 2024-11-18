<?php

namespace Database\Seeders;

use App\Models\FormularioClases;
use Illuminate\Database\Seeder;

class FormularioClasesSeeder extends Seeder
{
    public function run()
    {
        // Create 10 FormularioClases with 5 alumnos each
        FormularioClases::factory()
            ->count(10)
            ->withAlumnos(5)
            ->create();
    }
}
