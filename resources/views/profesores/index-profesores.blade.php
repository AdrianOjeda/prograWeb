@extends('layouts.windmill')

@section('contenido')

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Lista de Profesores
</h2>

<div class="mb-6">
    <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" href="{{ route('profesores.create') }}">
        Agregar profesor
    </a>
</div>

<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Nombre Completo</th>
                    <th class="px-4 py-3">Código</th>
                    <th class="px-4 py-3">Materias</th>
                    <th class="px-4 py-3">Creación</th>
                    <th class="px-4 py-3">Edición</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach($profesores as $profesor)
                    <tr class="text-gray-700 dark:text-gray-400 odd:bg-gray-50 even:bg-white">
                        <td class="px-4 py-3">{{ $profesor->id }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ route('profesores.show', $profesor) }}" class="text-blue-600 hover:underline">
                                {{ $profesor->nombre }} {{ $profesor->apellido_paterno }} {{ $profesor->apellido_materno }}
                            </a>
                        </td>
                        <td class="px-4 py-3">{{ $profesor->codigo }}</td>
                        <td class="px-4 py-3">
                            <ul class="list-disc list-inside">
                                @foreach(explode(',', $profesor->materias) as $materia)
                                    <li>{{ $materia }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="px-4 py-3">{{ $profesor->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">{{ $profesor->updated_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 flex space-x-4">
                            <!-- Botón para editar -->
                            <a href="{{ route('profesores.edit', $profesor) }}" class="flex items-center px-3 py-2 text-sm font-medium text-blue-600 bg-blue-100 rounded-lg hover:bg-blue-200 transition-colors duration-150">
                                <svg class="w-6 h-6 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>
                                Editar
                            </a>

                            <!-- Botón para eliminar -->
                            <form action="{{ route('profesores.destroy', $profesor) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex items-center px-3 py-2 text-sm font-medium text-red-600 bg-red-100 rounded-lg hover:bg-red-200 transition-colors duration-150" onclick="return confirm('¿Estás seguro de que deseas eliminar este profesor?')">
                                    <svg class="w-6 h-6 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
