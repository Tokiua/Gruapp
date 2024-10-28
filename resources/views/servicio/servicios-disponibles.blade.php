<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios Disponibles</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /* Estilos para la página de servicios disponibles */
        body {
            font-family: Arial, sans-serif;
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
        h2 {
            text-align: center;
            color: #333;
        }
        .service-item {
            margin: 20px 0;
            border: 1px solid #4CAF50;
            border-radius: 10px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none; /* Eliminar el subrayado del enlace */
            color: inherit; /* Mantener el color del texto */
            transition: background-color 0.3s; /* Transición suave al pasar el mouse */
        }
        .service-item:hover {
            background-color: #f0f0f0; /* Cambiar el color de fondo al pasar el mouse */
        }
        .service-title {
            font-size: 1.5rem;
            color: #4CAF50;
        }
        .service-description {
            color: #555;
        }
        .btn-back {
            background-color: #ff5733;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            margin-bottom: 20px; /* Añadir margen inferior */
            margin-top: 10px; /* Añadir margen superior */
            display: inline-block; /* Para que se aplique el margin correctamente */
        }
    </style>
</head>
<body>
    @extends('layouts.app') 
    @section('title', 'Servicios Disponibles - GruApp') 
    @section('content') 
    <div class="container">
        <button onclick="window.history.back();" class="btn-back">Atrás</button>
        <h2>Servicios Disponibles</h2>
        
        <a href="{{ route('formularios.emergencia') }}" class="service-item">
            <div class="service-title">Servicio de Emergencia</div>
            <div class="service-description">Asistencia rápida para cualquier emergencia vehicular.</div>
        </a>
        
        <a href="{{ route('formularios.mecanica') }}" class="service-item"> <!-- Enlace al formulario de mecánica -->
            <div class="service-title">Servicio de Mecánica</div>
            <div class="service-description">Ayuda con problemas de batería, llantas o gasolina.</div>
        </a>
    </div>
    @endsection
</body>
</html>
