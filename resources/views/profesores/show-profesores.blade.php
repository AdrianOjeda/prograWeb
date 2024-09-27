<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Profesor</title>
</head>
<body>
    <h1>Detalle del Profesor</h1>

    <ul>
        <li><strong>Nombre:</strong> {{ $profesor->nombre }}</li>
        <li><strong>Apellido Paterno:</strong> {{ $profesor->apellido_paterno }}</li>
        <li><strong>Apellido Materno:</strong> {{ $profesor->apellido_materno }}</li>
        <li><strong>Código:</strong> {{ $profesor->codigo }}</li>
        <li><strong>Edad:</strong> {{ $profesor->edad }}</li>
        <li><strong>Dirección:</strong> {{ $profesor->direccion }}</li>
        <li><strong>Fecha de Registro:</strong> 
            {{ is_string($profesor->fecha_registro) ? \Carbon\Carbon::parse($profesor->fecha_registro)->format('d/m/Y') : $profesor->fecha_registro->format('d/m/Y') }}
        </li>
        <li><strong>Materias:</strong>
            <ul>
                @foreach (explode(',', $profesor->materias) as $materia)
                    <li>{{ $materia }}</li>
                @endforeach
            </ul>
        </li>
    </ul>

    <!-- Botón para editar el profesor -->
    <a href="{{ route('profesores.edit', $profesor) }}">Editar</a>

    <!-- Formulario para eliminar el profesor -->
    <form action="{{ route('profesores.destroy', $profesor) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <input type="submit" value="Eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar este profesor?')">
    </form>

    <br>
    <a href="{{ route('profesores.index') }}">Volver a la lista de profesores</a>
</body>
</html>
