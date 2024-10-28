<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Solicitudes de Emergencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
            background-color: #FF9800; /* Color anaranjado */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            margin-bottom: 20px; /* Espacio debajo del botón */
            display: inline-block; /* Para que se aplique el margin correctamente */
        }
    </style>
</head>
<body>
    @extends('layouts.app')
    @section('title', 'Historial de Solicitudes de Emergencia')
    @section('content')
    <div class="container">
        <a href="{{ route('home') }}" class="btn-back">Atrás</a> <!-- Botón de atrás -->
        
        <h1>Historial de Solicitudes de Emergencia</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @foreach($solicitudes as $solicitud)
            <div class="card">
                <div class="card-header">
                    {{ $solicitud->nombre }} - {{ $solicitud->telefono }}
                </div>
                <div class="card-body">
                    <p><strong>Descripción:</strong> {{ $solicitud->descripcion }}</p>
                    <p><strong>Ubicación:</strong> {{ $solicitud->ubicacion_usuario }}</p>
                    <p><strong>Destino:</strong> {{ $solicitud->direccion_destino }}</p>
                </div>
                <div class="card-footer">
                    <strong>Estado:</strong> Pendiente
                </div>
            </div>
        @endforeach
    </div>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
