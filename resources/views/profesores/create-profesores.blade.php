@extends('layouts.windmill')

@section('contenido')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Agregar Profesor
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('profesores.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="nombre"
                        value="{{ old('nombre') }}"
                        placeholder="Ingresa el nombre">
                </label>
            </div>

            <!-- Apellido Paterno -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Apellido Paterno</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="apellido_paterno"
                        value="{{ old('apellido_paterno') }}"
                        placeholder="Ingresa el apellido paterno">
                </label>
            </div>

            <!-- Apellido Materno -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Apellido Materno</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="apellido_materno"
                        value="{{ old('apellido_materno') }}"
                        placeholder="Ingresa el apellido materno">
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
                        value="{{ old('codigo') }}"
                        placeholder="Ingresa el código">
                </label>
            </div>

            <!-- Edad -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Edad</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="number"
                        name="edad"
                        value="{{ old('edad') }}"
                        placeholder="Ingresa la edad">
                </label>
            </div>

            <!-- Dirección -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Dirección</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="direccion"
                        value="{{ old('direccion') }}"
                        placeholder="Ingresa la dirección">
                </label>
            </div>

            <!-- Fecha de Registro -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Fecha de Registro</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="date"
                        name="fecha_registro"
                        value="{{ old('fecha_registro') }}">
                </label>
            </div>

            <!-- Materias -->
            <div class="mb-4">
                <span class="text-gray-700 dark:text-gray-400">Materias</span>
                <div class="mt-2 grid grid-cols-2 gap-4">
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                        <input type="checkbox" name="materias[]" value="Programación" @checked(is_array(old('materias')) && in_array('Programación', old('materias'))) class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <span class="ml-2">Programación</span>
                    </label>
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                        <input type="checkbox" name="materias[]" value="Redes de Computadoras" @checked(is_array(old('materias')) && in_array('Redes de Computadoras', old('materias'))) class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <span class="ml-2">Redes de Computadoras</span>
                    </label>
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                        <input type="checkbox" name="materias[]" value="Sistemas Operativos" @checked(is_array(old('materias')) && in_array('Sistemas Operativos', old('materias'))) class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <span class="ml-2">Sistemas Operativos</span>
                    </label>
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                        <input type="checkbox" name="materias[]" value="Base de Datos" @checked(is_array(old('materias')) && in_array('Base de Datos', old('materias'))) class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <span class="ml-2">Base de Datos</span>
                    </label>
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                        <input type="checkbox" name="materias[]" value="Seguridad Informática" @checked(is_array(old('materias')) && in_array('Seguridad Informática', old('materias'))) class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <span class="ml-2">Seguridad Informática</span>
                    </label>
                </div>
            </div>

            <!-- Botón de Guardar -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="px-4 py-2 flex items-center text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple transition-colors duration-150">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 3H3a2 2 0 00-2 2v12a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2zM3 5h14v10H3V5z"></path>
                    </svg>
                    Guardar
                </button>
            </div>
        </form>
    </div>

    <a href="{{ route('profesores.index') }}" class="text-purple-600 hover:underline">Volver a la lista de profesores</a>
</div>
@endsection
