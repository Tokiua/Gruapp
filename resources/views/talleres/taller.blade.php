<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talleres - GruApp</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-custom {
            background-color: #FF9800; /* Color anaranjado */
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 20px;
            margin-top: 10px; /* Añadir margen superior */
            transition: background-color 0.3s;
            display: inline-block; /* Para que se aplique el margin correctamente */
        }
        .btn-custom:hover {
            background-color: #FB8C00; /* Color más oscuro al pasar el mouse */
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            color: #333;
        }
        .taller-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .taller-item {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
            transition: transform 0.3s;
        }
        .taller-item:hover {
            transform: translateY(-5px); /* Efecto de levantamiento */
        }
        .taller-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #4CAF50;
        }
        .taller-description {
            margin-bottom: 10px;
        }
        .taller-services {
            list-style-type: none;
            padding: 0;
            margin-bottom: 10px;
        }
        .taller-services li {
            margin: 5px 0;
        }
        p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    @extends('layouts.app') 
    @section('title', 'Talleres - GruApp') 
    @section('content') 
    <a href="javascript:history.back()" class="btn-custom">Atrás</a>
    <div class="container">
        <h1>Talleres Disponibles</h1>
        <div class="taller-container">
            @foreach ($talleres as $taller)
                <div class="taller-item">
                    <div class="taller-title">{{ $taller->nombre }}</div>
                    <div class="taller-description">{{ $taller->descripcion }}</div>
                    <ul class="taller-services">
                        @foreach ($taller->servicios as $servicio)
                            <li>{{ $servicio }}</li>
                        @endforeach
                    </ul>
                    <p><strong>Teléfono:</strong> {{ $taller->telefono }}</p>
                    <p><strong>Email:</strong> {{ $taller->email }}</p>
                    <p><strong>Ubicación:</strong> ({{ $taller->latitud }}, {{ $taller->longitud }})</p>
                    <a href="{{ route('taller.mapa', $taller->id) }}" class="btn btn-custom">Ver en el mapa</a>
                </div>
            @endforeach
        </div>
    </div>
    @endsection
</body>
</html>
