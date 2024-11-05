<?php

namespace App\Http\Controllers;

use App\Models\FormularioClases;
use App\Models\Profesor;
use Illuminate\Http\Request;

class FormularioClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clases = FormularioClases::with('profesor')->paginate(10); // Eager load professor relationship
        return view('index-clases', compact('clases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profesores = Profesor::all(); // Fetch all professors for the selection
        return view('create-clases', compact('profesores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'class_name' => 'required|string|max:255',
            'class_code' => 'required|string|max:100|unique:formulario_clases,class_code',
            'class_description' => 'required|string',
            'profesor_id' => 'required|exists:profesores,id', // Validate professor ID
        ]);

        // Create a new class with the validated data
        FormularioClases::create($validatedData);

        return redirect()->route('clases.index')->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clase = FormularioClases::with('profesor')->findOrFail($id); // Eager load professor relationship
        return view('show-clases', compact('clase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clase = FormularioClases::findOrFail($id);
        $profesores = Profesor::all(); // Fetch all professors for selection

        return view('edit-clases', compact('clase', 'profesores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $clase = FormularioClases::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'class_name' => 'required|string|max:255',
            'class_code' => 'required|string|max:100|unique:formulario_clases,class_code,' . $id,
            'class_description' => 'required|string',
            'profesor_id' => 'required|exists:profesores,id', // Validate professor ID
        ]);

        // Update the class with validated data
        $clase->update($validatedData);

        return redirect()->route('clases.show', $clase->id)->with('success', 'Class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormularioClases $clase)
    {
        $clase->delete();

        return redirect()->route('clases.index')->with('success', 'Class deleted successfully.');
    }
}
