@extends('layouts.windmillAlumno')

@section('contenido')
<div class="container mt-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <!-- Class Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-3xl font-semibold text-purple-600">{{ $clase->class_name }}</h3>
                <p class="text-lg text-gray-600 mt-2">{{ $clase->class_description }}</p>
            </div>
            <!-- Action Buttons -->
            <div class="flex space-x-4">
                <!-- Unregister Form -->
                <form action="{{ route('alumno.unregisterClass', $clase->id) }}" method="POST">
                    @csrf
                    <button 
                        type="submit" 
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Darse de baja
                    </button>
                </form>
            </div>
        </div>

        <!-- Instructor Information -->
        <div class="mb-6">
            <h4 class="text-xl font-semibold text-purple-600">Impartida por:</h4>
            <p class="text-lg text-gray-700">
                {{ optional($clase->profesor)->nombre }} 
                {{ optional($clase->profesor)->apellido ?? 'Profesor no asignado' }}
            </p>
        </div>
    </div>

    <!-- Posts Section -->
    <div class="mt-12"> <!-- Add more space above the posts section -->
        <h4 class="text-xl font-semibold text-purple-600">Publicaciones:</h4>
        <ul class="space-y-4">
            @foreach($clase->posts as $post)
                <li class="p-4 bg-gray-100 rounded-lg shadow-md">
                    <h5 class="text-lg font-semibold text-purple-600">{{ $post->title }}</h5>
                    <p class="text-gray-700 mt-2">{{ $post->content }}</p>
                    <p class="text-gray-500 text-sm mt-2">Publicado el: {{ $post->created_at->format('d/m/Y') }}</p>
                    
                    @if ($post->file_path)
                        <a 
                            href="{{ asset('storage/' . $post->file_path) }}" 
                            target="_blank" 
                            class="text-purple-600 underline mt-2 inline-block">
                            Ver archivo adjunto
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
