<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro en Clase</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1 {
            color: #4CAF50;
            text-align: center;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            color: #333333;
        }
        .class-details {
            background-color: #f9f9f9;
            border-left: 4px solid #4CAF50;
            padding: 10px;
            margin-top: 20px;
        }
        .class-details p {
            margin: 5px 0;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #777777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Hola, {{ $alumno->nombre }}!</h1>
        <p>Te has registrado exitosamente en la clase:</p>

        <div class="class-details">
            <p><strong>Nombre de la clase:</strong> {{ $clase->class_name }}</p>
            <p><strong>Descripción:</strong> {{ $clase->class_description }}</p>
        </div>

        <p>¡Te deseamos mucho éxito!</p>

        <div class="footer">
            <p>Este es un correo automatizado. No respondas a este mensaje.</p>
        </div>
    </div>
</body>
</html>
