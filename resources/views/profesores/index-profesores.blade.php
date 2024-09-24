<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Mensajes</h1>

    <p>
        <a href="{{ route('profesores.create') }}">Agregar nuevo profesor</a>
    </p>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Materia</th>
                <th>Creacion</th>
                <th>Edicion</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach($profesores as $profesor)
            <tr>
                <td>{{ $profesor->id }}</td>
                <td>
                    <a href="{{ route('profesores.show', $profesor) }}">
                        {{ $profesor->nombre }}
                    </a>
                </td>
                <td>{{ $profesor->fecha }}</td>
                <td>{{ $profesor->materia }}</td>
                <td>{{ $profesor->created_at }}</td>
                <td>{{ $profesor->updated_at }}</td>
                <td>
                    <a href="{{ route('profesores.edit', $profesor) }}">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>