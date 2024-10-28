<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TallerController;
use App\Http\Controllers\GruaController;
use App\Http\Controllers\SolicitudGruasController;
use App\Http\Controllers\SolicitudEmergenciaController;
use App\Http\Controllers\SolicitudMecanicaController;


Route::get('/home', function () {
    return view('home');
});
//información del usuario

// En routes/web.php
Route::get('/informacion-usuario', [UserController::class, 'mostrarInformacion'])->name('informacion.usuario');

//servicios disponibles

Route::view('/servicio/servicios-disponibles', 'servicio.servicios-disponibles');

//talleres

Route::get('/talleres', [TallerController::class, 'index'])->name('talleres');

//mapa de tallers:
Route::get('/talleres/mapa/{id}', [TallerController::class, 'mostrarMapa'])->name('taller.mapa');

//grua

Route::get('/formularios/grua', [SolicitudGruasController::class, 'create'])->name('formularios.grua');

Route::post('/solicitud/grua/solicitar', [SolicitudGruasController::class, 'store'])->name('servicio.grua.solicitar');
Route::get('/solicitudes/historial', [SolicitudGruasController::class, 'historial'])->name('solicitudes.historial');
//emergencia

Route::get('/formularios/emergencia', [SolicitudEmergenciaController::class, 'create'])->name('formularios.emergencia');
Route::post('/servicio/emergencia/solicitar', [SolicitudEmergenciaController::class, 'store'])->name('servicio.emergencia.solicitar');
Route::get('/solicitudes/emergencia', [SolicitudEmergenciaController::class, 'historial'])->name('solicitudes.emergencia.historial');

//mecanica:


Route::get('/formularios/mecanica', [SolicitudMecanicaController::class, 'create'])->name('formularios.mecanica');
Route::post('/servicio/mecanica/solicitar', [SolicitudMecanicaController::class, 'store'])->name('servicio.mecanica.solicitar');
Route::get('/solicitudes/mecanica', [SolicitudMecanicaController::class, 'historial'])->name('solicitudes.mecanica.historial');

// En routes/web.php

Route::get('/mapscom/{id}', [GruaController::class, 'mostrarMapa'])->name('mapscom');
//menu:
use App\Http\Controllers\ConsultaController;

Route::get('/historial/grua', [ConsultaController::class, 'historialGrua'])->name('solicitudes.grua');
Route::get('/historial/emergencia', [ConsultaController::class, 'historialEmergencia'])->name('solicitudes.emergencia');
Route::get('/historial/mecanica', [ConsultaController::class, 'historialMecanica'])->name('solicitudes.mecanica.historial');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
