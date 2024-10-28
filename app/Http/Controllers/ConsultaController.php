<?php

namespace App\Http\Controllers;

use App\Models\SolicitudGrua;
use App\Models\SolicitudEmergencia;
use App\Models\SolicitudMecanica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultaController extends Controller
{
    public function historialGrua()
    {
        // Filtrar solicitudes por el email del usuario autenticado
        $solicitudes = SolicitudGrua::where('user_email', Auth::user()->email)->get();
        return view('pendiente.historial_grua', compact('solicitudes'));
    }

    public function historialEmergencia()
    {
        // Filtrar solicitudes por el email del usuario autenticado
        $solicitudes = SolicitudEmergencia::where('user_email', Auth::user()->email)->get();
        return view('pendiente.historial_emergencia', compact('solicitudes'));
    }

    public function historialMecanica()
    {
        // Filtrar solicitudes por el email del usuario autenticado
        $solicitudes = SolicitudMecanica::where('user_email', Auth::user()->email)->get();
        return view('pendiente.historial_mecanica', compact('solicitudes'));
    }
}
