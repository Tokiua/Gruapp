<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Solicitudes</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 15px 0;
            padding: 15px;
        }
        .card-header {
            font-size: 1.2em;
            font-weight: bold;
        }
        .card-body {
            margin-top: 10px;
        }
        .card-footer {
            margin-top: 10px;
            font-size: 0.9em;
            color: #666;
        }
        .btn-back {
            display: inline-block;
            background-color: #FF9800; /* Color anaranjado */
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin-bottom: 20px; /* Espacio debajo del botón */
            text-decoration: none; /* Sin subrayado */
        }
    </style>
</head>
<body>
    @extends('layouts.app')
    @section('title', 'Historial de Solicitudes')
    @section('content')
    <div class="container">
        <a href="{{ route('home') }}" class="btn-back">Atrás</a> <!-- Botón de atrás -->
        
        <h1>Historial de Solicitudes</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @foreach($solicitudes as $solicitud)
            <div class="card">
                <div class="card-header">
                    {{ $solicitud->nombre }} - {{ $solicitud->telefono }}
                </div>
                <div class="card-body">
                    <p><strong>Marca:</strong> {{ $solicitud->marca }}</p>
                    <p><strong>Modelo:</strong> {{ $solicitud->modelo }}</p>
                    <p><strong>Placa:</strong> {{ $solicitud->placa }}</p>
                    <p><strong>Descripción:</strong> {{ $solicitud->descripcion }}</p>
                    <p><strong>Destino:</strong> {{ $solicitud->direccion_destino ?: 'Taller: ' . ($solicitud->taller ? $solicitud->taller->nombre : 'No especificado') }}</p>
                    <p><strong>Ubicación:</strong> {{ $solicitud->ubicacion_usuario }}</p>
                </div>
                <div class="card-footer">
                    <strong>Estado:</strong> {{ $solicitud->estado }}
                </div>
            </div>
        @endforeach
    </div>
    @endsection
</body>
</html>
