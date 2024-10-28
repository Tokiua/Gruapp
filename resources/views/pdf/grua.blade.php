<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Servicio de Grua</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #444;
        }
        .info {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
        }
        .footer {
            margin-top: 30px;
            font-size: 0.9rem;
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Solicitud de Servicio de Grua</h1>
        <p><strong>Fecha y Hora:</strong> {{ $solicitud->created_at }}</p>
        <div class="info">
            <p><strong>Nombre del Solicitante:</strong> {{ $solicitud->nombre }}</p>
            <p><strong>Teléfono:</strong> {{ $solicitud->telefono }}</p>
            <p><strong>Marca del Vehículo:</strong> {{ $solicitud->marca }}</p>
            <p><strong>Modelo del Vehículo:</strong> {{ $solicitud->modelo }}</p>
            <p><strong>Tipo de Vehículo:</strong> {{ $solicitud->tipo_vehiculo }}</p>
            <p><strong>Placa del Vehículo:</strong> {{ $solicitud->placa }}</p>
            <p><strong>Descripción del Problema:</strong> {{ $solicitud->descripcion }}</p>
            <p><strong>Dirección de Destino:</strong> {{ $solicitud->direccion_destino ?: 'Taller' }}</p>
            <p><strong>Ubicación del Usuario:</strong> {{ $solicitud->ubicacion_usuario }}</p>
            <p><strong>Taller Seleccionado:</strong> {{ optional($solicitud->taller)->nombre }}</p>
        </div>
        <div class="footer">
            <p>Gracias por usar nuestros servicios.</p>
        </div>
    </div>
</body>
</html>
