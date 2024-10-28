<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Solicitudes de Mecánica</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        .request-item {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    @extends('layouts.app')
    @section('title', 'Historial de Solicitudes de Mecánica')
    @section('content')
    <div class="container">
        <h1>Historial de Solicitudes de Mecánica</h1>

        @foreach($solicitudes as $solicitud)
            <div class="request-item">
                <p><strong>Nombre:</strong> {{ $solicitud->nombre }}</p>
                <p><strong>Teléfono:</strong> {{ $solicitud->telefono }}</p>
                <p><strong>Modelo:</strong> {{ $solicitud->modelo }}</p>
                <p><strong>Marca:</strong> {{ $solicitud->marca }}</p>
                <p><strong>Tipo de Problema:</strong> {{ $solicitud->tipo_problema }}</p>
                <p><strong>Descripción:</strong> {{ $solicitud->descripcion }}</p>
                <p><strong>Detalles del Problema:</strong> {{ $solicitud->detalles_problema }}</p>
                <p><strong>Ubicación:</strong> {{ $solicitud->ubicacion_usuario }}</p>
                <p><strong>Fecha:</strong> {{ $solicitud->created_at }}</p>
            </div>
        @endforeach
    </div>
    @endsection
</body>
</html>
