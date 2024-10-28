@extends('layouts.app') 
@section('title', 'Ubicación - GruApp') 
@section('content') 
<div class="container">
    <a href="javascript:history.back()" class="btn btn-secondary" style="margin-bottom: 20px;">Atrás</a>
    <h1>Ubicación de {{ $taller->nombre }}</h1>

    <div style="height: 500px; width: 100%;">
        <iframe 
            src="https://maps.google.com/maps?q={{ $taller->latitud }},{{ $taller->longitud }}&hl=es;z=14&output=embed" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen 
            loading="lazy">
        </iframe>
    </div>
</div>
@endsection
