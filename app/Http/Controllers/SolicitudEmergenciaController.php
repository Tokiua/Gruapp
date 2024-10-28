<?php

namespace App\Http\Controllers;

use App\Models\SolicitudEmergencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudEmergenciaController extends Controller
{
    public function create()
    {
        return view('formularios.emergencia');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'descripcion' => 'required|string',
            'location' => 'required|string',
            'direccion_destino' => 'required|string|max:255',
        ]);

        SolicitudEmergencia::create([
            'user_id' => Auth::id(),
            'user_email' => Auth::user()->email,
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'descripcion' => $request->descripcion,
            'ubicacion_usuario' => $request->location,
            'direccion_destino' => $request->direccion_destino,
        ]);

        return redirect()->route('solicitudes.emergencia.historial')->with('success', 'Solicitud de emergencia enviada con éxito.');
    }

    public function historial()
    {
        $solicitudes = SolicitudEmergencia::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('solicitudes.emergencia', compact('solicitudes'));
    }
}

