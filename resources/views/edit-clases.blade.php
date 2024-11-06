@extends('layouts.windmill')

@section('contenido')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Editar Clase
    </h2>

    <!-- Mostrar mensaje general de errores -->
    @if ($errors->any())
        <div class="px-4 py-3 mb-8 bg-red-100 border border-red-400 text-red-700 rounded-lg" role="alert">
            <strong class="font-bold">Ups, algo salió mal!</strong>
            <span class="block sm:inline">Por favor revisa los campos marcados e intenta de nuevo.</span>
        </div>
    @endif

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('clases.update', $clase) }}" method="POST">
            @csrf
            @method('PATCH')

            <!-- Nombre de la clase -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="class_name"  
                        value="{{ old('class_name', $clase->class_name) }}" 
                        placeholder="Ingresa el nombre de la clase">
                    @error('class_name')  <!-- Update error message reference -->
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>

            <!-- Código de la clase -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Código de la clase</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="class_code"  
                        value="{{ old('class_code', $clase->class_code) }}"
                        placeholder="Ingresa el codigo de la clase" 
                    >
                    @error('class_code')  <!-- Update error message reference -->
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>

            <!-- Descripción de la clase -->
            <div class="mb-4">
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Descripción de la clase</span>
        <textarea
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            name="class_description"
            placeholder="Ingresa la descripción de la clase">{{ old('class_description', $clase->class_description) }}</textarea>
        @error('class_description')
            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
        @enderror
    </label>
</div>

<div class="mb-4">
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Profesor</span>
        <select
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-select"
            name="profesor_id">
            <option value="">Selecciona un profesor</option>
            @foreach ($profesores as $profesor)
                <option value="{{ $profesor->id }}" {{ $clase->profesor_id == $profesor->id ? 'selected' : '' }}>
                    {{ $profesor->nombre }}
                </option>
            @endforeach
        </select>
        @error('profesor_id')
            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
        @enderror
    </label>
</div>



            <!-- Botón de Actualizar -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="px-4 py-2 flex items-center text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple transition-colors duration-150">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 3H3a2 2 0 00-2 2v12a2 2 0 002 2h14a2 2 0 002-2V5a 2 2 0 00-2-2zM3 5h14v10H3V5zm3 8v2H4v-2h2zm0-4v2H4V9h2zm3 8v-2h-2v2h2zm0-4v-2H7v2h2zm3 4v-2h-2v2h2zm0-4v-2H7v2h2zm3 4v-2H7v2h2zm0-4v-2h-2v2h2z"></path>
                    </svg>
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
