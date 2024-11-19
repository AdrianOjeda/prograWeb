@extends('layouts.windmill')

@section('contenido')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Editar Alumno
    </h2>

       <!-- Mostrar mensaje general de errores -->
       @if ($errors->any())
              <div class="px-4 py-3 mb-8 bg-red-100 border border-red-400 text-red-700 rounded-lg" role="alert">
              <strong class="font-bold">Ups, algo salió mal!</strong>
              <span class="block sm:inline">Por favor revisa los campos marcados e intenta de nuevo.</span>
              </div>
       @endif

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('alumnos.update', $alumno) }}" method="POST">
            @csrf
            @method('PATCH')

            <!-- Nombre -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="nombre"
                        value="{{ old('nombre', $alumno->nombre) }}"
                        placeholder="Ingresa el nombre">
                    @error('nombre')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>

            <!-- Apellido Paterno -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Apellido</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="apellido"
                        value="{{ old('apellido', $alumno->apellido) }}"
                        placeholder="Ingresa el apellido">
                    @error('apellido')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>


            <!-- Código -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Código</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="codigo"
                        value="{{ old('codigo', $alumno->codigo) }}"
                        placeholder="Ingresa el código">
                    @error('codigo')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>


            <!-- Botón de Actualizar -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="px-4 py-2 flex items-center text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple transition-colors duration-150">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 3H3a2 2 0 00-2 2v12a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2zM3 5h14v10H3V5z"></path>
                    </svg>
                    Actualizar
                </button>
            </div>
        </form>
    </div>

    <a href="{{ route('alumnos.show', $alumno) }}" class="text-purple-600 hover:underline">Volver al detalle</a>
</div>
@endsection
