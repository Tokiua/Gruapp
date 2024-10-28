@extends('layouts.app') 
@section('title', 'Ubicación - GruApp') 
@section('content') 
<div class="container">
    <a href="javascript:history.back()" class="btn btn-secondary" style="margin-bottom: 20px;">Atrás</a>
    <h1>Ubicación de {{ $taller->nombre }}</h1>

    <div id="location-notification" style="display: none; background-color: #ffcc00; padding: 10px; border-radius: 5px;">
        Por favor, enciende tu GPS y activa la conexión a Internet para obtener tu ubicación.
    </div>

    <div style="height: 500px; width: 100%;">
        <iframe 
            id="map"
            src="" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen 
            loading="lazy">
        </iframe>
    </div>
</div>

<script>
    function checkLocation() {
        if (!navigator.onLine) {
            document.getElementById('location-notification').style.display = 'block';
            document.getElementById('location-notification').innerText = 'Por favor, activa tu conexión a Internet.';
            return;
        }

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            document.getElementById('location-notification').style.display = 'block';
            document.getElementById('location-notification').innerText = 'Geolocalización no soportada por este navegador.';
        }
    }

    function showPosition(position) {
        const latSolicitante = position.coords.latitude;
        const lonSolicitante = position.coords.longitude;

        const latTaller = {{ $taller->latitud }};
        const lonTaller = {{ $taller->longitud }};

        const iframeSrc = `https://maps.google.com/maps?q=${latSolicitante},${lonSolicitante}&ll=${latSolicitante},${lonSolicitante}&z=14&output=embed&markers=color:red%7Clabel:T%7C${latTaller},${lonTaller}&markers=color:blue%7Clabel:S%7C${latSolicitante},${lonSolicitante}`;
        document.getElementById('map').src = iframeSrc;
    }

    function showError(error) {
        document.getElementById('location-notification').style.display = 'block';
        let errorMessage = 'Se produjo un error desconocido.';
        switch(error.code) {
            case error.PERMISSION_DENIED:
                errorMessage = 'Permiso de geolocalización denegado.';
                break;
            case error.POSITION_UNAVAILABLE:
                errorMessage = 'La ubicación no está disponible.';
                break;
            case error.TIMEOUT:
                errorMessage = 'Tiempo de espera agotado para obtener la ubicación.';
                break;
        }
        document.getElementById('location-notification').innerText = errorMessage;
        console.error(errorMessage); // Log del error en la consola
    }

    window.onload = checkLocation;
</script>
@endsection
