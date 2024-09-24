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

    <form action="{{ route('profesores.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') }}"><br>

        <label for="fecha">Fecha:</label><br>
        <input type="date" name="fecha" id="fecha" value="{{ old('fecha') }}">

        <label for="materia">Materia:</label><br>
        <select name="materia" id="materia">
            <option value="Español">Español</option>
            <option value="Matematicas">Matematicas</option>
            <option value="Ingles">Ingles</option>
            <option value="Biologia">Biologia</option>
        </select>  
      

        <input type="submit" value="Enviar">
    </form>
</body>
</html>