<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FormularioClases;
use App\Mail\ClaseRegistrationMail;
use Illuminate\Support\Facades\Mail;

class AlumnosController extends Controller
{

    public function dashboard()
    {
        
        $user = Auth::user();
        
        if (!$user) {
           
            return redirect()->route('login');
        }

        // Fetch the alumno associated with this user
        $alumno = $user->alumno;
        
        if (!$alumno) {
           
            return redirect()->route('some.other.route')->with('error', 'Alumno not found.');
        }

        $registeredClasses = $alumno->clases()->pluck('formulario_clases.id');

        // Fetch the classes the alumno is NOT registered in, including the professor
        $unregisteredClasses = FormularioClases::whereNotIn('id', $registeredClasses)
            ->with('profesor') 
            ->get();

        return view('dashboards.alumno', compact('unregisteredClasses', 'alumno'));
    }

    public function showClassDetails($id)
    {
        $clase = FormularioClases::findOrFail($id); 
        return view('alumnos.class-details', compact('clase'));
    }
    public function search(Request $request)
    { 
        $query = $request->input('query');

         
        $searchResults = FormularioClases::where('class_name', 'LIKE', '%' . $query . '%')
            ->orWhere('class_description', 'LIKE', '%' . $query . '%')
            ->with('profesor')  
            ->get();

         
        return view('alumnos.search-results', compact('searchResults', 'query'));
    }

    public function registerClass($id)
    {
        $user = Auth::user();
        $alumno = $user->alumno;

        if (!$alumno) {
            return redirect()->route('dashboard')->with('error', 'Alumno not found.');
        }

        
        $class = FormularioClases::find($id);

        if (!$class) {
            return redirect()->route('dashboard')->with('error', 'Clase no encontrada.');
        }

        
        $alumno->clases()->attach($class->id);
        Mail::to($user->email)->send(new ClaseRegistrationMail($alumno, $class));
        return redirect()->route('dashboard')->with('success', 'Te has registrado en la clase con éxito.');
    }

    public function misClases()
    {
        $user = Auth::user();
        $alumno = $user->alumno;

        if (!$alumno) {
            return redirect()->route('login')->with('error', 'Alumno no encontrado.');
        }

        $registeredClasses = $alumno->clases;

        return view('alumnos.mis-clases', compact('registeredClasses'));
    }

    public function unregisterClass(Request $request, $classId)
    {
        $user = Auth::user();
        $alumno = $user->alumno;

        if (!$alumno) {
            return redirect()->route('login')->with('error', 'Alumno no encontrado.');
        }

       
        $class = $alumno->clases()->find($classId);

        if (!$class) {
            return redirect()->route('alumno.misClases')->with('error', 'Clase no encontrada o no está registrado.');
        }

        
        $alumno->clases()->detach($classId);

        return redirect()->route('alumno.misClases')->with('success', 'Te has dado de baja de la clase exitosamente.');
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
       
        return view('alumnos.create-alumno');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'codigo' => 'required|string|unique:alumnos,codigo|max:50',
        ]);


        Alumno::create($validated);

        
        return redirect()->route('alumnos.index')->with('success', 'Alumno creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
       
        return view('alumnos.show-alumnos', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        
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

        
        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        // Delete the alumno.
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado exitosamente.');
    }
}
