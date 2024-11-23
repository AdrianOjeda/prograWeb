@extends('layouts.windmillProfesor')

@section('contenido')
<div class="mt-8">
    <h3 class="text-2xl font-semibold text-purple-600">Detalles de la Clase:</h3>
    <div class="p-6 bg-gray-100 rounded-lg shadow-md">
        <h4 class="text-xl font-bold">{{ $clase->class_name }}</h4>
        <p class="text-gray-700"><strong>Descripción:</strong> {{ $clase->class_description }}</p>
        <p class="text-gray-700"><strong>Estudiantes inscritos:</strong> {{ $studentCount }}</p>
        <p class="text-gray-700"><strong>Código:</strong> {{ $clase->codigo }}</p>
    </div>
    
    <div class="mt-8">
        <h3 class="text-2xl font-semibold text-purple-600">Mis Posts en esta Clase:</h3>
        <a href="{{ route('posts.create', $clase->id) }}" class="inline-block px-4 py-2 mt-2 bg-purple-600 text-white rounded-md hover:bg-purple-700">
            Crear Nuevo Post
        </a>
        <ul class="mt-4 space-y-4">
            @forelse($posts as $post)
                <li class="p-4 bg-gray-100 rounded-lg shadow-md">
                    <h4 class="text-xl font-bold">{{ $post->title }}</h4>
                    <p class="text-gray-700">{{ $post->content }}</p>
                    @if($post->file_path)
                        <p class="text-gray-700">
                            <strong>Archivo:</strong>
                            <a href="{{ Storage::url($post->file_path) }}" class="text-blue-500 hover:underline" target="_blank">
                                Descargar archivo
                            </a>
                        </p>
                    @endif
                    <p class="text-sm text-gray-500">Publicado: {{ $post->created_at->format('d/m/Y H:i') }}</p>
                    
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button 
                            type="submit" 
                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                            Eliminar Post
                        </button>
                    </form>
                </li>
            @empty
                <p class="font-semibold text-purple-600">Aún no has creado posts para esta clase.</p>
            @endforelse
        </ul>
    </div>
</div>
@endsection
