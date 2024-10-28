<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Mecánica</title>
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
        .btn-back, .btn-submit {
            background-color: #FF9800; 
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            display: block;
            width: 100%;
        }
        .btn-submit:hover {
            background-color: #FB8C00; 
        }
        input[type="text"], input[type="tel"], textarea, select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            box-sizing: border-box; 
        }
    </style>
</head>
<body>
    @extends('layouts.app')
    @section('title', 'Solicitud de Mecánica')
    @section('content')
    <div class="container">
        <button onclick="window.history.back();" class="btn-back">Atrás</button>
        <h1>Solicitud de Mecánica</h1>

        <form action="{{ route('servicio.mecanica.solicitar') }}" method="POST">
            @csrf

            <input type="hidden" name="ubicacion_usuario" id="ubicacion_usuario">

            <div>
                <label for="nombre">Nombre del Solicitante:</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div>
                <label for="telefono">Teléfono:</label>
                <input type="tel" name="telefono" id="telefono" required>
            </div>
            <div>
                <label for="modelo">Modelo del Vehículo:</label>
                <input type="text" name="modelo" id="modelo" required>
            </div>
            <div>
                <label for="marca">Marca del Vehículo:</label>
                <input type="text" name="marca" id="marca" required>
            </div>
            <div>
                <label for="descripcion">Descripción del Problema:</label>
                <textarea name="descripcion" id="descripcion" required></textarea>
            </div>
            <div>
                <label for="tipo_problema">Tipo de Problema:</label>
                <select name="tipo_problema" id="tipo_problema" required>
                    <option value="">Seleccione...</option>
                    <option value="bateria">Batería</option>
                    <option value="llantas">Llantas</option>
                    <option value="gasolina">Gasolina</option>
                </select>
            </div>
            <div id="detalles" style="display: none;">
                <label for="detalles_problema">Detalles del Problema:</label>
                <textarea name="detalles_problema" id="detalles_problema"></textarea>
            </div>
            <button type="submit" class="btn-submit">Solicitar</button>
        </form>
    </div>

    <script>
        document.getElementById('tipo_problema').addEventListener('change', function() {
            var detalles = document.getElementById('detalles');
            detalles.style.display = this.value ? 'block' : 'none';
        });

        document.addEventListener("DOMContentLoaded", function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById('ubicacion_usuario').value = position.coords.latitude + ',' + position.coords.longitude;
                }, function() {
                    alert("No se pudo obtener la ubicación.");
                });
            } else {
                alert("La geolocalización no es soportada por este navegador.");
            }
        });
    </script>
    @endsection
</body>
</html>
