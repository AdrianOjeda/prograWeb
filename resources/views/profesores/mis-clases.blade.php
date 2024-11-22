@extends('layouts.windmillProfesor')

@section('contenido')
<div class="mt-8">
    <h3 class="text-2xl font-semibold text-purple-600">Mis Clases:</h3>
    <ul class="mt-4 space-y-4">
        @forelse($registeredClasses as $clase)
            <li class="p-4 bg-gray-100 rounded-lg shadow-md">
                <h4 class="text-xl font-bold">{{ $clase->class_name }}</h4>
                <p class="text-gray-700">{{ $clase->class_description }}</p>
                <p class="text-gray-700">
                    <strong>Número de estudiantes:</stron> {{ $clase->students ? $clase->students->count() : 0 }}
                </p>
                <p class="text-gray-700">
                    <strong>Código de la clase:</strong> {{ $clase->class_code }}
                </p>
            </li>
        @empty
            <p class="font-semibold text-purple-600">No estás registrado en ninguna clase.</p>
        @endforelse
    </ul>
</div>
@endsection
