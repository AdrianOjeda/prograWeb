<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle profesor</title>
</head>
<body>
    <h1>{{ $profesor->nombre }}</h1> 
    <p>
        <ul>
            <li>Nombre del profesor: {{ $profesor->nombre }}</li>
            <li>Materia que imparte: {{ $profesor->materia }}</li>
        </ul>
    </p>
    <a href="{{ route('profesores.edit', $profesor) }}">Editar</a>

    <form action="{{ route('profesores.destroy', $profesor) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Borrar">
    </form>
</body>
</html>