@extends('layouts.windmill')

@section('contenido')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Detalles de la Clase
    </h2>

    <div class="bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="card-header">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $clase->class_name }}</h2>
        </div>
        <div class="card-body p-4">
            <p class="text-gray-700 dark:text-gray-400"><strong>Código de la clase:</strong> {{ $clase->class_code }}</p>
            <p class="text-gray-700 dark:text-gray-400"><strong>Descripción:</strong> {{ $clase->class_description }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('clases.index') }}" class="px-4 py-2 text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple transition-colors duration-150">
            Regresar a la lista de clases
        </a>
    </div>
</div>
@endsection
