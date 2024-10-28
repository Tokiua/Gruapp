<?php

namespace App\Http\Controllers;

use App\Models\SolicitudGrua;
use App\Models\Taller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudGruasController extends Controller
{
    public function create()
    {
        $talleres = Taller::all(); // Obtener todos los talleres
        return view('formularios.grua', compact('talleres')); // Asegúrate de que la vista sea correcta
    }
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'tipo_vehiculo' => 'required|string',
            'placa' => 'required|string|max:10',
            'descripcion' => 'required|string',
            'direccion_destino' => 'nullable|string|max:255',
            'taller_id' => 'nullable|exists:talleres,id',
            'location' => 'required|string',
        ]);

        $solicitud = new SolicitudGrua();
        $solicitud->user_id = Auth::id();
        $solicitud->user_email = Auth::user()->email;
        $solicitud->nombre = $request->nombre;
        $solicitud->telefono = $request->telefono;
        $solicitud->marca = $request->marca;
        $solicitud->modelo = $request->modelo;
        $solicitud->tipo_vehiculo = $request->tipo_vehiculo;
        $solicitud->placa = $request->placa;
        $solicitud->descripcion = $request->descripcion;
        $solicitud->ubicacion_usuario = $request->location;

        // Guardar la dirección de destino según la selección del taller
        if ($request->filled('taller_id')) {
            $solicitud->taller_id = $request->taller_id;
            $taller = Taller::find($request->taller_id);
            $solicitud->direccion_destino = $taller ? $taller->direccion : null;
        } elseif ($request->filled('direccion_destino')) {
            $solicitud->direccion_destino = $request->direccion_destino; // Dirección ingresada por el usuario
        }

        $solicitud->save();

        return redirect()->route('solicitudes.historial')->with('success', 'Solicitud enviada con éxito.');
    }

    public function historial()
    {
        $solicitudes = SolicitudGrua::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('solicitudes.historial', compact('solicitudes'));
    }
}
