@extends('layouts.windmillAlumno')

@section('contenido')
<div class="mt-8">
    <h3 class="text-2xl font-semibold text-purple-600">Mis Clases Registradas:</h3>
    <ul class="mt-4 space-y-4">
        @forelse($registeredClasses as $clase)
            <li class="p-4 bg-gray-100 rounded-lg shadow-md">
                <h4 class="text-xl font-bold">{{ $clase->class_name }}</h4>
                <p class="text-gray-700">{{ $clase->class_description }}</p>
                <p class="text-gray-700">
                    Impartida por: 
                    {{ optional($clase->profesor)->nombre }} 
                    {{ optional($clase->profesor)->apellido ?? 'Profesor no asignado' }}
                </p>
                <form action="{{ route('alumno.unregisterClass', $clase->id) }}" method="POST">
                    @csrf
                    <button 
                        type="submit" 
                        class="mt-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Darse de baja
                    </button>
                </form>
            </li>
        @empty
            <p class="font-semibold text-purple-600">No estás registrado en ninguna clase.</p>
        @endforelse
    </ul>
</div>
@endsection
