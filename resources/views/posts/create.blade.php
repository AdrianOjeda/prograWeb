@extends('layouts.windmillProfesor')

@section('contenido')
<div class="mt-8">
    <h3 class="text-2xl font-semibold text-purple-600">Crear un nuevo Post para: {{ $clase->class_name }}</h3>
    <form action="{{ route('posts.store', $clase->id) }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="title" id="title" class="w-full mt-1 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Contenido</label>
            <textarea name="content" id="content" rows="5" class="w-full mt-1 rounded-md shadow-sm" required></textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700">
            Publicar
        </button>
    </form>
</div>
@endsection
