<?php

namespace App\Http\Controllers;

use App\Models\Profesor; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfesoresController extends Controller
{
    public function index()
    {
        $profesores = Profesor::with('clases')->get();
        $this->authorize('viewAny', Profesor::class);
        $profesores = Profesor::all(); 
        return view('profesores.index-profesores', compact('profesores'));
    }

    public function misClases()
    {
        $user = Auth::user();
        $profesor = $user->profesor;

        if (!$profesor) {
            return redirect()->route('login')->with('error', 'Profesor no encontrado.');
        }

        $registeredClasses = $profesor->clases;

        return view('profesores.mis-clases', compact('registeredClasses'));
    }

    public function create()
    {
        return view('profesores.create-profesores');
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'min:5', // Mínimo 5 caracteres
                'max:255',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', // Solo letras y espacios
            ],
            'apellido' => [
                'required',
                'string',
                'min:5',
                'max:255',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', // Solo letras y espacios
            ],
            'codigo' => [
                'required',
                'digits_between:8,10', // Mínimo 8 y máximo 10 dígitos
                'regex:/^[0-9]+$/', // Solo números
                'unique:profesores,codigo', // Código único en la tabla profesores
            ],
            
        ], [
            // Mensajes personalizados
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 5 letras.',
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
            'apellido_paterno.required' => 'El campo apellido paterno es obligatorio.',
            'apellido_paterno.min' => 'El apellido paterno debe tener al menos 5 letras.',
            'apellido_paterno.regex' => 'El apellido paterno solo puede contener letras y espacios.',
            'apellido_materno.required' => 'El campo apellido materno es obligatorio.',
            'apellido_materno.min' => 'El apellido materno debe tener al menos 5 letras.',
            'apellido_materno.regex' => 'El apellido materno solo puede contener letras y espacios.',
            'codigo.required' => 'El código es obligatorio.',
            'codigo.digits_between' => 'El código debe tener entre 8 y 10 dígitos.',
            'codigo.regex' => 'El código solo puede contener números.',
            'codigo.unique' => 'El código ya ha sido registrado.',
            'edad.min' => 'La edad mínima es 18 años.',
            'materias.required' => 'Debe seleccionar al menos una materia.',
        ]);
    
        // Si la validación es correcta, crear el profesor
        Profesor::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido_paterno,
            
            'codigo' => $request->codigo,
           
        ]);
    
        return redirect()->route('profesores.index')->with('success', 'Profesor creado correctamente.');
    }

    public function detalleClase($id)
    {
        $user = Auth::user();
        $profesor = $user->profesor;

        if (!$profesor) {
            return redirect()->route('login')->with('error', 'Profesor no encontrado.');
        }

        
        $clase = $profesor->clases()->where('id', $id)->first();

        if (!$clase) {
            return redirect()->route('profesores.mis-clases')->with('error', 'Clase no encontrada o no autorizada.');
        }

        $studentCount = $clase->alumnos()->count(); // Assuming a relationship with students
        return view('profesores.detalle-clase', compact('clase', 'studentCount'));
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
        // Validar los datos
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'min:5',
                'max:255',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', // Solo letras y espacios
            ],
            'apellido' => [
                'required',
                'string',
                'min:5',
                'max:255',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', // Solo letras y espacios
            ],
            'codigo' => [
                'required',
                'digits_between:8,10', // Mínimo 8 y máximo 10 dígitos
                'regex:/^[0-9]+$/', // Solo números
                'unique:profesores,codigo,' . $profesor->id, // Ignorar el código del profesor actual
            ],
        ], [
            // Mensajes personalizados
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 5 letras.',
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
            'apellido_paterno.required' => 'El campo apellido paterno es obligatorio.',
            'apellido_paterno.min' => 'El apellido paterno debe tener al menos 5 letras.',
            'apellido_paterno.regex' => 'El apellido paterno solo puede contener letras y espacios.',
            'apellido_materno.required' => 'El campo apellido materno es obligatorio.',
            'apellido_materno.min' => 'El apellido materno debe tener al menos 5 letras.',
            'apellido_materno.regex' => 'El apellido materno solo puede contener letras y espacios.',
            'codigo.required' => 'El código es obligatorio.',
            'codigo.digits_between' => 'El código debe tener entre 8 y 10 dígitos.',
            'codigo.regex' => 'El código solo puede contener números.',
            'codigo.unique' => 'El código ya ha sido registrado.',
            'edad.min' => 'La edad mínima es 18 años.',
            'materias.required' => 'Debe seleccionar al menos una materia.',
        ]);
    
        // Si la validación es correcta, actualizar el profesor
        $profesor->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'codigo' => $request->codigo,
            
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
