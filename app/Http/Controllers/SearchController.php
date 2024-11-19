<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\Alumno;
use App\Models\FormularioClases;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search Professors
        $professor = Profesor::where('nombre', 'like', "%$query%")->first();
        if ($professor) {
            return redirect()->route('profesores.show', $professor->id);
        }

        // Search Alumnos
        $alumno = Alumno::where('nombre', 'like', "%$query%")->first();
        if ($alumno) {
            return redirect()->route('alumnos.show', $alumno->id);
        }

        // Search Classes
        $clase = FormularioClases::where('class_name', 'like', "%$query%")->first();
        if ($clase) {
            return redirect()->route('clases.show', $clase->id);
        }

        // Default Redirect if Not Found
        return redirect()->back()->with('error', 'No matching records found.');
    }
}
