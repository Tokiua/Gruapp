<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #e9ecef;
        padding: 20px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #4CAF50;
        margin-bottom: 20px;
    }

    .card {
        border: 1px solid #4CAF50;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .card h3 {
        margin-top: 0;
        color: #388E3C;
    }

    .btn-back {
        background-color: #FF9800;
        color: white;
        padding: 10px 15px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        display: block;
        margin: 20px auto;
        text-align: center;
        text-decoration: none;
    }

    .btn-back:hover {
        background-color: #FB8C00;
    }

    /* Responsividad */
    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }

        .card {
            padding: 10px;
        }

        .btn-back {
            width: 100%;
        }
    }
</style>

@extends('layouts.app')

@section('title', 'Historial de Grúa')

@section('content')
<div class="container">
    <h1>Historial de Solicitudes de Grúa</h1>
    
    @foreach($solicitudes as $solicitud)
        <div class="card">
            <h3>{{ $solicitud->nombre }}</h3>
            <p>Teléfono: {{ $solicitud->telefono }}</p>
            <p>Marca: {{ $solicitud->marca }}</p>
            <p>Modelo: {{ $solicitud->modelo }}</p>
            <p>Descripción: {{ $solicitud->descripcion }}</p>
            <p>Estado: {{ $solicitud->estado }}</p>
        </div>
    @endforeach

    <a href="javascript:history.back()" class="btn-back">Atrás</a>
</div>
@endsection
