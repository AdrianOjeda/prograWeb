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
        $clases = FormularioClases::all();

       
        return view('index-clases', compact('clases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    // Return the form view to create a new class
        return view('create-clases');
    }
    public function store(Request $request)
    {
    // Validate the incoming request data
    $request->validate([
        'class_name' => 'required|string|max:255',
        'class_code' => 'required|string|max:100|unique:formulario_clases,class_code',
        'class_description' => 'required|string',
    ]);

    // Create a new class
    FormularioClases::create([
        'class_name' => $request->input('class_name'),
        'class_code' => $request->input('class_code'),
        'class_description' => $request->input('class_description'),
    ]);

    // Redirect to the list of classes after successful creation
    return redirect()->route('clases.index')->with('success', 'Class created successfully.');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function show($id)
    {
    // Now $clase refers to the model instance for the given ID in the URL
        return view('show-clases');
    }

    public function edit(FormularioClases $clase)
    {
    // $clase will be the model instance passed to this method
    }

    public function update(Request $request, FormularioClases $clase)
    {
    // $clase is the model instance you want to update
    }

    public function destroy(FormularioClases $clase)
    {
    // $clase is the model instance to delete
    }
}
