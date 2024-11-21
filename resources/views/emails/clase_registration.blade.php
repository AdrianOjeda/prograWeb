<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro en Clase</title>
</head>
<body>
    <h1>¡Hola, {{ $alumno->nombre }}!</h1>
    <p>Te has registrado exitosamente en la clase:</p>
    <p><strong>Nombre de la clase:</strong> {{ $clase->class_name }}</p>
    <p><strong>Descripción:</strong> {{ $clase->class_description }}</p>
    <p>¡Te deseamos mucho éxito!</p>
</body>
</html>
