<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar profesor</title>
</head>
<body>
    <h1>Editar profesor</h1>

    <form action="{{ route('profesores.update', $profesor) }}" method="POST">
        @csrf
        @method('PATCH') 

        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre', $profesor->nombre) }}"><br><br>

        <label for="apellido_paterno">Apellido Paterno:</label><br>
        <input type="text" name="apellido_paterno" value="{{ old('apellido_paterno', $profesor->apellido_paterno) }}"><br><br>

        <label for="apellido_materno">Apellido Materno:</label><br>
        <input type="text" name="apellido_materno" value="{{ old('apellido_materno', $profesor->apellido_materno) }}"><br><br>

        <label for="codigo">Código:</label><br>
        <input type="text" name="codigo" value="{{ old('codigo', $profesor->codigo) }}"><br><br>

        <label for="edad">Edad:</label><br>
        <input type="number" name="edad" value="{{ old('edad', $profesor->edad) }}"><br><br>

        <label for="direccion">Dirección:</label><br>
        <input type="text" name="direccion" value="{{ old('direccion', $profesor->direccion) }}"><br><br>

        <label for="fecha_registro">Fecha de Registro:</label><br>
        <input type="date" name="fecha_registro" value="{{ old('fecha_registro', $profesor->fecha_registro->format('Y-m-d')) }}"><br><br>

        <label for="materias">Materias:</label><br>
        <input type="checkbox" name="materias[]" value="Programación" 
               @checked(in_array('Programación', old('materias', explode(',', $profesor->materias))))> Programación<br>
        <input type="checkbox" name="materias[]" value="Redes de Computadoras" 
               @checked(in_array('Redes de Computadoras', old('materias', explode(',', $profesor->materias))))> Redes de Computadoras<br>
        <input type="checkbox" name="materias[]" value="Sistemas Operativos" 
               @checked(in_array('Sistemas Operativos', old('materias', explode(',', $profesor->materias))))> Sistemas Operativos<br>
        <input type="checkbox" name="materias[]" value="Base de Datos" 
               @checked(in_array('Base de Datos', old('materias', explode(',', $profesor->materias))))> Base de Datos<br>
        <input type="checkbox" name="materias[]" value="Seguridad Informática" 
               @checked(in_array('Seguridad Informática', old('materias', explode(',', $profesor->materias))))> Seguridad Informática<br>
        <br><br>

        <input type="submit" value="Actualizar">
    </form>

    <a href="{{ route('profesores.show', $profesor) }}">Volver al detalle</a>
</body>
</html>
