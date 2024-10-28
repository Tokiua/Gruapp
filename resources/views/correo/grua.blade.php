<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Servicio de Grua</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4CAF50;
        }
        p {
            font-size: 1rem;
            line-height: 1.5;
            color: #444;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.8rem;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Solicitud de Servicio de Grua Recibida</h1>
        <p>Estimado usuario,</p>
        <p>Hemos recibido su solicitud de servicio de grúa. A continuación, encontrará los detalles de su solicitud:</p>
        <p><strong>Nombre del Solicitante:</strong> {{ $solicitud->nombre }}</p>
        <p><strong>Teléfono:</strong> {{ $solicitud->telefono }}</p>
        <p><strong>Fecha y Hora:</strong> {{ $solicitud->created_at }}</p>
        <p>Adjunto a este correo, encontrará un PDF con los detalles de su solicitud.</p>
        <div class="footer">
            <p>Gracias por elegir nuestros servicios.</p>
        </div>
    </div>
</body>
</html>
