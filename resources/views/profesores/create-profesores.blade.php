<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar profesor</title>
</head>
<body>
    <h1>Agregar profesor</h1>

    <form action="{{ route('profesores.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') }}"><br><br>

        <label for="apellido_paterno">Apellido Paterno:</label><br>
        <input type="text" name="apellido_paterno" value="{{ old('apellido_paterno') }}"><br><br>

        <label for="apellido_materno">Apellido Materno:</label><br>
        <input type="text" name="apellido_materno" value="{{ old('apellido_materno') }}"><br><br>

        <label for="codigo">Código:</label><br>
        <input type="text" name="codigo" value="{{ old('codigo') }}"><br><br>

        <label for="edad">Edad:</label><br>
        <input type="number" name="edad" value="{{ old('edad') }}"><br><br>

        <label for="direccion">Dirección:</label><br>
        <input type="text" name="direccion" value="{{ old('direccion') }}"><br><br>

        <label for="fecha_registro">Fecha de Registro:</label><br>
        <input type="date" name="fecha_registro" value="{{ old('fecha_registro') }}"><br><br>

        <label for="materias">Materias:</label><br>
        <input type="checkbox" name="materias[]" value="Programación" @checked(is_array(old('materias')) && in_array('Programación', old('materias'))) > Programación<br>
        <input type="checkbox" name="materias[]" value="Redes de Computadoras" @checked(is_array(old('materias')) && in_array('Redes de Computadoras', old('materias'))) > Redes de Computadoras<br>
        <input type="checkbox" name="materias[]" value="Sistemas Operativos" @checked(is_array(old('materias')) && in_array('Sistemas Operativos', old('materias'))) > Sistemas Operativos<br>
        <input type="checkbox" name="materias[]" value="Base de Datos" @checked(is_array(old('materias')) && in_array('Base de Datos', old('materias'))) > Base de Datos<br>
        <input type="checkbox" name="materias[]" value="Seguridad Informática" @checked(is_array(old('materias')) && in_array('Seguridad Informática', old('materias'))) > Seguridad Informática<br>
        <br><br>

        <input type="submit" value="Enviar">
    </form>

    <a href="{{ route('profesores.index') }}">Volver a la lista de profesores</a>
</body>
</html>
