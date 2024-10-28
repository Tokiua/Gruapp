<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Servicio de Grua</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /* Estilos aquí */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-back, .btn-map, .btn-submit {
            background-color: #FF9800; /* Color anaranjado */
            color: white;
            padding: 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            width: 100%; /* Full width for buttons */
            transition: background-color 0.3s;
            margin-top: 10px; /* Añadir margen superior */
        }
        .btn-map {
            background-color: #0044ff; /* Color para el botón de mapa */
        }
        .btn-submit:hover {
            background-color: #FB8C00; /* Color más oscuro al pasar el mouse */
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="tel"], select, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            box-sizing: border-box; /* Incluye padding y border en el ancho total */
        }
        .taller {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: flex; /* Usar flexbox para alinear elementos */
            justify-content: space-between; /* Espacio entre los elementos */
            align-items: center; /* Centrar verticalmente */
        }
        .map-button-container {
            margin-left: 10px; /* Espaciado a la izquierda del botón */
        }
        /* Media Queries para mejorar la adaptabilidad */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
            .btn-submit {
                padding: 12px 15px; /* Ajustar padding para pantallas más pequeñas */
            }
            .taller {
                flex-direction: column; /* Apilar elementos en pantallas pequeñas */
                align-items: flex-start; /* Alinear a la izquierda */
            }
            .map-button-container {
                margin-top: 10px; /* Espaciado superior en pantallas pequeñas */
                margin-left: 0; /* Resetear margen izquierdo */
            }
        }
    </style>
</head>
<body>
    @extends('layouts.app') 
    @section('title', 'Solicitud de Servicio de Grua') 
    @section('content') 
    <div class="container">
        <a href="javascript:history.back()" class="btn-back">Atrás</a>
        <h1 style="margin-top: 20px;">Solicitud de Servicio de Grua</h1>
        
        <form action="{{ route('servicio.grua.solicitar') }}" method="POST">
            @csrf
            
            <input type="hidden" name="location" id="location"> <!-- Campo oculto para la ubicación -->
            
            <div>
                <label for="nombre">Nombre del Solicitante:</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div>
                <label for="telefono">Teléfono:</label>
                <input type="tel" name="telefono" id="telefono" required>
            </div>
            <div>
                <label for="marca">Marca del Vehículo:</label>
                <input type="text" name="marca" id="marca" required>
            </div>
            <div>
                <label for="modelo">Modelo del Vehículo:</label>
                <input type="text" name="modelo" id="modelo" required>
            </div>
            <div>
                <label for="tipo_vehiculo">Tipo de Vehículo:</label>
                <select name="tipo_vehiculo" id="tipo_vehiculo" required>
                    <option value="ligero">Ligero</option>
                    <option value="pesado">Pesado</option>
                    <option value="motocicleta">Motocicleta</option>
                </select>
            </div>
            <div>
                <label for="placa">Placa del Vehículo:</label>
                <input type="text" name="placa" id="placa" required>
            </div>
            <div>
                <label for="descripcion">Descripción del Problema:</label>
                <textarea name="descripcion" id="descripcion" required></textarea>
            </div>
    
            <h3>Dirección de Destino</h3>
            <div>
                <label>Seleccione un destino:</label>
                <div>
                    <input type="radio" name="destino" value="talleres" id="talleres" onclick="toggleDestinos(true)" checked>
                    <label for="talleres">Talleres con nosotros</label>
                </div>
                <div>
                    <input type="radio" name="destino" value="otro" id="otro" onclick="toggleDestinos(false)">
                    <label for="otro">Otro destino</label>
                </div>
            </div>
    
            <div id="destinos" style="display: block;">
                <h4>Talleres Disponibles</h4>
                @foreach ($talleres as $taller)
                    <div class="taller">
                        <div>
                            <input type="radio" name="taller_id" value="{{ $taller->id }}" id="taller_{{ $taller->id }}">
                            <label for="taller_{{ $taller->id }}">{{ $taller->nombre }}</label>
                        </div>
                        
                    </div>
                @endforeach
                <p><strong>Nota:</strong> Seleccione solo un taller.</p>
            </div>
    
            <div id="otro-destino" style="display: none;">
                <label for="direccion_destino">Ingrese la dirección de destino:</label>
                <input type="text" name="direccion_destino" id="direccion_destino">
            </div>
    
            <button type="submit" class="btn-submit">Solicitar</button>
        </form>
    </div>
    
    <script>
        function toggleDestinos(isTalleres) {
            if (isTalleres) {
                document.getElementById('destinos').style.display = 'block';
                document.getElementById('otro-destino').style.display = 'none';
                document.getElementById('direccion_destino').value = ''; // Limpiar campo de otro destino
                const talleresRadios = document.querySelectorAll('input[name="taller_id"]');
                talleresRadios.forEach(radio => {
                    radio.checked = false;
                });
            } else {
                document.getElementById('destinos').style.display = 'none';
                document.getElementById('otro-destino').style.display = 'block';
                const talleresRadios = document.querySelectorAll('input[name="taller_id"]');
                talleresRadios.forEach(radio => {
                    radio.checked = false; // Desmarcar talleres
                });
            }
        }

        // Obtener la ubicación del usuario
        document.addEventListener("DOMContentLoaded", function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById('location').value = position.coords.latitude + ',' + position.coords.longitude;
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
