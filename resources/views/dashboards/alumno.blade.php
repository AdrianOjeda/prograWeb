@extends('layouts.windmillAlumno')

@section('contenido')
<div id="welcome-message" class="p-6 mb-4 bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 text-white rounded-lg shadow-lg">
    <h2 class="text-5xl font-semibold">Bienvenido, alumno!</h2>
    <p class="mt-2 text-lg">A tu izquierda encontrarás la barra de navegación
        <br> para que puedas empezar a administrar el sistema!</p>
</div>

<div class="mt-8">
    <h3 class="text-2xl font-semibold">Clases disponibles:</h3>
    <ul class="mt-4 space-y-4">
        @forelse($unregisteredClasses as $clase)
            <li class="p-4 bg-gray-100 rounded-lg shadow-md">
                <h4 class="text-xl font-bold">{{ $clase->class_name }}</h4>
                <p class="text-gray-700">{{ $clase->class_description }}</p>
                <form action="{{ route('clases.register', $clase->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Registrar
                    </button>
                </form>
            </li>
        @empty
            <p class="text-gray-500">¡Felicidades! Ya estás registrado en todas las clases.</p>
        @endforelse
    </ul>
</div>
@endsection
