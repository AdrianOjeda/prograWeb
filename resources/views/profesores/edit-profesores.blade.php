<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar profesor</title>
</head>
<body>
    <h1>Agregar profesor</h1>

    <form action="{{ route('profesores.update', $profesor) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') ?? $profesor->nombre}}"><br>

        <label for="fecha">Fecha:</label><br>
        <input type="date" name="fecha" id="fecha" value="{{ old('fecha') ?? $profesor->fecha}}">

        <label for="materia">Materia:</label><br>
        <select name="materia" id="materia">
            <option value="Español" @selected($profesor->materia == 'Español')>Español</option>
            <option value="Matematicas" @selected($profesor->materia == 'Matematicas')>Matematicas</option>
            <option value="Ingles" @selected($profesor->materia == 'Ingles')>Ingles</option>
            <option value="Biologia" @selected($profesor->materia == 'Biologia')>Biologia</option>
        </select>  
      

        <input type="submit" value="Enviar">
    </form>
</body>
</html>