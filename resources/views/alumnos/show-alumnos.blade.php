@extends('layouts.windmill')

@section('contenido')

<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Detalle del Alumno
    </h2>

    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <!-- Información del Profesor -->
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Información General
            </h4>
            <ul class="text-sm text-gray-700 dark:text-gray-400">
                <li><strong>Nombre Completo:</strong> {{ $alumno->nombre }} {{ $alumno->apellido }}</li>
                <li><strong>Código:</strong> {{ $alumno->codigo }}</li>
                
            </ul>
        </div>

        <!-- Materias que imparte -->
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Materias
            </h4>
            <ul class="text-sm text-gray-700 dark:text-gray-400">
                @foreach(explode(',', $alumno->materias) as $materia)
                    <li>- {{ $materia }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Botones de acción -->
    <div class="flex space-x-4">
        <!-- Botón para editar -->
        <a href="{{ route('alumnos.edit', $alumno) }}" class="flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
            </svg>
            Editar
        </a>

        <!-- Formulario para eliminar -->
        <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este profesor?')" class="flex items-center">
            @csrf
            @method('DELETE')
            <button type="submit" class="flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                Eliminar
            </button>
        </form>
    </div>

    <!-- Volver a la lista -->
    <div class="mt-6">
        <a href="{{ route('alumnos.index') }}" class="text-purple-600 hover:underline">
            Volver a la lista de alumnos
        </a>
    </div>
</div>

@endsection
