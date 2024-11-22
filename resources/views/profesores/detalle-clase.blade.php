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
</div>
@endsection
