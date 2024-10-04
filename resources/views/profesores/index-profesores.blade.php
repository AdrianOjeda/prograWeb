<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Profesores</title>
</head>
<body>
    <h1>Lista de Profesores</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Código</th>
                <th>Materias</th>
                <th>Creación</th>
                <th>Edición</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profesores as $profesor)
                <tr>
                    <td>{{ $profesor->id }}</td>
                    <td>
                        <a href="{{ route('profesores.show', $profesor) }}">
                            {{ $profesor->nombre }} {{ $profesor->apellido_paterno }} {{ $profesor->apellido_materno }}
                        </a>
                    </td>
                    <td>{{ $profesor->codigo }}</td>
                    <td>
                        <ul>
                            @foreach(explode(',', $profesor->materias) as $materia)
                                <li>{{ $materia }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $profesor->created_at->format('d/m/Y') }}</td>
                    <td>{{ $profesor->updated_at->format('d/m/Y') }}</td>
                    <td>
                        <!-- Botón para editar -->
                        <a href="{{ route('profesores.edit', $profesor) }}">Editar</a>
                        <!-- Formulario para eliminar -->
                        <form action="{{ route('profesores.destroy', $profesor) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este profesor?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route('profesores.create') }}">Agregar nuevo profesor</a>
</body>
</html>
