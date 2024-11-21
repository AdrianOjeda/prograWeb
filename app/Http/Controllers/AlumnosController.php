<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FormularioClases;

class AlumnosController extends Controller
{

    public function dashboard(Alumno $alumno)
    {
        // Fetch registered classes
        $registeredClasses = $alumno->clases()->pluck('formulario_clases.id');

        // Fetch unregistered classes
        $unregisteredClasses = FormularioClases::whereNotIn('id', $registeredClasses)->get();

        return view('alumnos.dashboard', compact('unregisteredClasses', 'alumno'));
    }

    
    public function index()
    {
        // Fetch all alumnos.
        $alumnos = Alumno::all();
        return view('alumnos.index-alumnos', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Render the form for creating a new alumno.
        return view('alumnos.create-alumno');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request.
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'codigo' => 'required|string|unique:alumnos,codigo|max:50',
        ]);

        // Create the alumno using the validated data.
        Alumno::create($validated);

        // Redirect back with a success message.
        return redirect()->route('alumnos.index')->with('success', 'Alumno creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        // Show details for a specific alumno.
        return view('alumnos.show-alumnos', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        // Render the edit form with the alumno's data.
        return view('alumnos.edit-alumnos', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        // Validate the incoming request.
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'codigo' => "required|string|max:50|unique:alumnos,codigo,{$alumno->id}",
        ]);

        // Update the alumno with the validated data.
        $alumno->update($validated);

        // Redirect back with a success message.
        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        // Delete the alumno.
        $alumno->delete();

        // Redirect back with a success message.
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado exitosamente.');
    }
}
