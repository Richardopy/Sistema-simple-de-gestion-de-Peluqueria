<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Nuevo mensaje de Cliente</title>
</head>
<body>
    <p>Hola! Se ha reportado un nuevo cliente queriendo contactar con su empresa </p>
    <p>Estos son los datos del usuario que ha realizado el reporte:</p>
    <ul>
        <li>Nombre: {{ $contacto->nombre }}</li>
        <li>Teléfono: {{ $contacto->celular }}</li>
        <li>Mensaje: {{ $contacto->mensaje }}</li>
    </ul>
</body>
</html>