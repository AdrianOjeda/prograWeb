<?php

namespace App\Http\Controllers;

use App\Models\Profesor; 
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    public function index()
    {
        $profesores = Profesor::all(); 
        return view('profesores.index-profesores', compact('profesores'));
    }

    public function create()
    {
        return view('profesores.create-profesores');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'codigo' => 'required|unique:profesores,codigo',
            'edad' => 'required|integer|min:18',
            'direccion' => 'required|max:255',
            'fecha_registro' => 'required|date',
            'materias' => 'required|array', 
        ]);
    
        $profesor = Profesor::create([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'codigo' => $request->codigo,
            'edad' => $request->edad,
            'direccion' => $request->direccion,
            'fecha_registro' => $request->fecha_registro,
            'materias' => implode(',', $request->materias), 
        ]);
    
        return redirect()->route('profesores.index')->with('success', 'Profesor creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profesor $profesor) 
    {
        return view('profesores.show-profesores', compact('profesor')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profesor $profesor) 
    {
        return view('profesores.edit-profesores', compact('profesor')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profesor $profesor)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'codigo' => 'required|unique:profesores,codigo,' . $profesor->id, 
            'edad' => 'required|integer|min:18',
            'direccion' => 'required|max:255',
            'fecha_registro' => 'required|date',
            'materias' => 'required|array',
        ]);

        $profesor->update([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'codigo' => $request->codigo,
            'edad' => $request->edad,
            'direccion' => $request->direccion,
            'fecha_registro' => $request->fecha_registro,
            'materias' => implode(',', $request->materias),
        ]);

        return redirect()->route('profesores.show', $profesor)->with('success', 'Profesor actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profesor $profesor) 
    {
        $profesor->delete();

        return redirect()->route('profesores.index');
    }
}
