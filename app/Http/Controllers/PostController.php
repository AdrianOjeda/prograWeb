<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\FormularioClases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create($classId)
    {
        $clase = FormularioClases::findOrFail($classId);

        return view('posts.create', compact('clase'));
    }

    public function store(Request $request, $classId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $profesor = Auth::user()->profesor;

        Post::create([
            'class_id' => $classId,
            'profesor_id' => $profesor->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('profesor.detalleClase', $classId)
                         ->with('success', 'Post creado exitosamente.');
    }

    public function index($classId)
    {
        $clase = FormularioClases::with('posts')->findOrFail($classId);

        return view('posts.index', compact('clase'));
    }
}
