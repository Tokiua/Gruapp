<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Usuario</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            color: #444;
        }
        .user-info {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
            position: relative;
        }
        h2 {
            text-align: center;
            color: #4CAF50;
            margin-top: 50px; /* Ajuste del margen superior para separar del botón */
            font-size: 2rem;
            font-weight: 600;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        .user-detail {
            margin: 15px 0;
            font-size: 1.2rem;
            padding: 10px;
            border-radius: 8px;
            background-color: #f9f9f9;
            transition: background-color 0.3s ease;
        }
        .user-detail:hover {
            background-color: #e6ffe6;
        }
        .btn-back {
            background-color: #FF9800; /* Color anaranjado */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            margin-bottom: 20px; /* Añadir margen inferior */
            display: inline-block; /* Para que se aplique el margin correctamente */
            transition: background-color 0.3s;
            position: absolute;
            top: 15px; /* Ajuste de la posición superior */
            left: 20px;
        }
        .btn-back:hover {
            background-color: #FB8C00; /* Color más oscuro al pasar el mouse */
        }
    </style>
</head>
<body>
    <div class="container user-info">
        <button class="btn-back" onclick="window.history.back();">Atrás</button>
        <h2>Información del Usuario</h2>
        <div class="user-detail"><strong>Nombre:</strong> {{ $usuario->name }}</div>
        <div class="user-detail"><strong>Email:</strong> {{ $usuario->email }}</div>
        <!-- Agrega más campos según sea necesario -->
    </div>
</body>
</html>
