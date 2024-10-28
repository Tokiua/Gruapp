<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GruApp - Servicios</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) 
    <style>
        /* Estilos generales */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e9ecef; /* Fondo más suave */
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background-color: white; /* Fondo blanco para contraste */
            border-radius: 15px; /* Bordes redondeados */
            position: relative; /* Para posicionar el dropdown */
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.8rem;
            color: #4CAF50; /* Verde llamativo */
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Estilo para el menú desplegable */
        .dropdown {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
            text-align: right;
            width: 100%;
        }
        .dropbtn {
            background-color: #4CAF50; /* Color del botón */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Estilo para los contenedores de servicios */
        .service-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
        }

        .service-item {
            border: 2px solid #4CAF50; 
            border-radius: 10px;
            padding: 20px;
            display: flex;
            flex-direction: row;
            align-items: center;
            width: 100%;
            max-width: 350px;
            background-color: white;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2); /* Sombra más profunda */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            overflow: hidden; /* Evitar desbordamiento */
        }

        .service-item:hover {
            transform: translateY(-5px); 
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3); /* Sombra más intensa */
        }

        .service-image {
            width: 100px;
            height: 100px;
            margin-right: 20px;
            border: 2px solid #4CAF50; 
            border-radius: 10px; 
            transition: transform 0.3s ease;
        }

        .service-image:hover {
            transform: scale(1.1); /* Efecto hover más llamativo */
        }

        .service-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .service-title {
            font-size: 1.6rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #4CAF50; 
            transition: color 0.3s;
        }

        .service-title:hover {
            color: #388E3C; /* Color más oscuro al pasar el mouse */
        }

        .service-description {
            font-size: 1rem;
            color: #555;
        }

        /* Adaptabilidad a dispositivos móviles */
        @media (max-width: 768px) {
            .service-container {
                flex-direction: column;
                align-items: center;
            }

            .service-item {
                max-width: 100%;
            }

            .dropdown {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    @extends('layouts.app') 
    @section('title', 'Inicio - GruApp') 
    @section('content') 
    <div class="container">
        <div class="dropdown">
            <button class="dropbtn">Historial</button>
            <div class="dropdown-content">
                <a href="{{ route('solicitudes.grua') }}">Historial de Grúa</a>
                <a href="{{ route('solicitudes.emergencia') }}">Historial de Emergencia</a>
                <a href="{{ route('solicitudes.mecanica.historial') }}">Historial Mecánica</a>
            </div>
        </div>
        
        <h1>Servicios</h1>
        <div class="service-container">
            <!-- Servicio en el lugar -->
            <a href="{{ url('/servicio/servicios-disponibles') }}" class="service-item">
                <img src="/imagenes/servicio-en-el-lugar.jpg" alt="Servicio en el Lugar" class="service-image">
                <div class="service-text">
                    <div class="service-title">Servicio en el lugar</div>
                    <div class="service-description">Reparaciones y mantenimiento de vehículos a domicilio, garantizando comodidad y eficiencia donde te encuentres.</div>
                </div>
            </a>
            
            <!-- Servicio de Grua -->
            <a href="{{ route('formularios.grua') }}" class="service-item">
                <img src="/imagenes/servicio-grua.jpg" alt="Servicio de Grua" class="service-image">
                <div class="service-text">
                    <div class="service-title">Servicio de Grua</div>
                    <div class="service-description">Un servicio rápido y seguro para remolcar tu vehículo donde lo necesites.</div>
                </div>
            </a>

            <!-- Talleres -->
            <a href="{{ route('talleres') }}" class="service-item">
                <img src="/imagenes/talleres.jpg" alt="Talleres" class="service-image">
                <div class="service-text">
                    <div class="service-title">Talleres</div>
                    <div class="service-description">Encuentra talleres cercanos y especializados para cualquier tipo de reparación de tu vehículo.</div>
                </div>
            </a>
        </div>
    </div>
    @endsection
</body>
</html>
