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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("create-clase");
        //
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
