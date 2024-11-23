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

    public function storePost(Request $request)
    {
         // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048', // Validate file type and size
        ]);

        $filePath = null;

        
        if ($request->hasFile('file')) {
            
            $filePath = $request->file('file')->store('posts', 'public');
        }

        
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'file_path' => $filePath,
            'class_id' => $request->input('class_id'), 
            'profesor_id' => Auth::user()->profesor->id, 
        ]);

       
        return redirect()->route('profesor.detalleClase', $request->input('class_id'))
            ->with('success', 'Post creado exitosamente.');
    }


    public function index($classId)
    {
        $clase = FormularioClases::with('posts')->findOrFail($classId);

        return view('posts.index', compact('clase'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Ensure the logged-in professor is the owner of the post
        if (Auth::user()->profesor->id !== $post->profesor_id) {
            return redirect()->back()->with('error', 'No tienes permiso para eliminar este post.');
        }

        $post->delete();

        return redirect()->back()->with('success', 'El post ha sido eliminado exitosamente.');
    }

}
