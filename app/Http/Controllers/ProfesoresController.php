<?php

namespace App\Http\Controllers;

use App\Models\Profesor; // Modelo en singular
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    public function index()
    {
        $profesores = Profesor::all(); // Modelo en singular
        return view('profesores.index-profesores', compact('profesores'));
    }

    public function create()
    {
        return view('profesores.create-profesores');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'max:255'],
            'fecha' => ['required', 'date'],
            'materia' => ['required'],
        ]);

        $profesor = Profesor::create($request->all());

        return redirect()->route('profesores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profesor $profesor) // Cambio a singular y $profesores a $profesor
    {
        return view('profesores.show-profesores', compact('profesor')); // Esto es opcional, solo si tienes una vista show-profesor
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profesor $profesor) // Cambio a singular y $profesores a $profesor
    {
        return view('profesores.edit-profesores', compact('profesor')); // Esto es opcional, solo si tienes una vista edit-profesor
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profesor $profesor) // Cambio a singular y $profesores a $profesor
    {
        $profesor->update($request->all());

        return redirect()->route('profesores.show', $profesor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profesor $profesor) // Cambio a singular y $profesores a $profesor
    {
        $profesor->delete();

        return redirect()->route('profesores.index');
    }
}
