<?php

namespace App\Http\Controllers;

use App\Models\FormularioClases;
use Illuminate\Http\Request;

class FormularioClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clases = FormularioClases::paginate(10); // Paginate results
        return view('index-clases', compact('clases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-clases');
    }

    public function store(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'class_name' => 'required|string|max:255',
        'class_code' => 'required|string|max:100|unique:formulario_clases,class_code',
        'class_description' => 'required|string',
    ]);

    // Create a new class using the validated data
    FormularioClases::create($validatedData);

    return redirect()->route('clases.index')->with('success', 'Class created successfully.');
}

    public function show($id)
    {
        $clase = FormularioClases::findOrFail($id);
        return view('show-clases', compact('clase'));
    }

    public function edit($id)
    {
        $clase = FormularioClases::findOrFail($id);
        
        return view('edit-clases', compact('clase'));
    }

    public function update(Request $request, $id)
{
    $clase = FormularioClases::findOrFail($id);

    // Validate the request data
    $request->validate([
        'class_name' => 'required|string|max:255',
        'class_code' => 'required|string|max:255',
        'class_description' => 'required|string',
    ]);

    // Update the class with validated data
    $clase->update($request->only(['class_name', 'class_code', 'class_description']));

    return redirect()->route('clases.show', $clase->id)->with('success', 'Clase actualizada correctamente.');
}

    public function destroy(FormularioClases $clase)
    {
        $clase->delete();

        return redirect()->route('clases.index')->with('success', 'Class deleted successfully.');
    }
}
