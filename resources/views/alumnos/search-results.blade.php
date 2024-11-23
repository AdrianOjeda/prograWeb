@extends('layouts.windmillAlumno')

@section('contenido')

<div class="mt-8">
    <!-- Header Section -->
    <h3 class="text-2xl font-semibold text-purple-600">
        Resultados de búsqueda para: "{{ $query }}"
    </h3>

    <!-- Search Results -->
    <ul class="mt-4 space-y-4">
        @forelse($searchResults as $clase)
            <li class="p-4 bg-gray-100 rounded-lg shadow-md">
                <h4 class="text-xl font-bold">{{ $clase->class_name }}</h4>
                <p class="text-gray-700">{{ $clase->class_description }}</p>
                <p class="text-gray-700">
                    Impartida por: 
                    {{ optional($clase->profesor)->nombre }} 
                    {{ optional($clase->profesor)->apellido ?? 'Profesor no asignado' }}
                </p>
                <!-- Registration Button -->
                <form action="{{ route('alumno.registerClass', $clase->id) }}" method="POST">
                    @csrf
                    <button 
                        type="submit" 
                        class="mt-2 px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700"
                    >
                        Registrarse
                    </button>
                </form>
            </li>
        @empty
            <p class="text-purple-600">No se encontraron clases que coincidan con tu búsqueda.</p>
        @endforelse
    </ul>

    
    <div class="mt-8">
        <div class="bg-purple-100 p-4 rounded-lg shadow-md">
            <a href="{{ route('alumno.dashboard') }}" 
            class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                Regresar al dashboard
            </a>
        </div>
    </div>

</div>

@endsection
