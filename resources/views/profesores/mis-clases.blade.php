@extends('layouts.windmillProfesor')

@section('contenido')
<div class="mt-8">
    <h3 class="text-2xl font-semibold text-purple-600">Mis Clases:</h3>
    <ul class="mt-4 space-y-4">
        @forelse($registeredClasses as $clase)
        <li class="p-4 bg-gray-100 rounded-lg shadow-md">
            <a href="{{ route('profesor.detalleClase', $clase->id) }}" class="block">
                <h4 class="text-xl font-bold">{{ $clase->class_name }}</h4>
                <p class="text-gray-700">{{ $clase->class_description }}</p>
                <p class="text-gray-700">Estudiantes inscritos: {{ $clase->alumnos()->count() }}</p>
            </a>
        </li>
    @empty
        <p class="font-semibold text-purple-600">No tienes clases registradas.</p>
    @endforelse

    </ul>
</div>
@endsection
