<?php
namespace App\Http\Controllers;

use App\Models\SolicitudMecanica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudMecanicaController extends Controller
{
    public function create()
    {
        return view('formularios.mecanica');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'modelo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'tipo_problema' => 'required|string',
            'detalles_problema' => 'nullable|string',
            'descripcion' => 'nullable|string', // Agrega esta línea
            'ubicacion_usuario' => 'required|string',
        ]);
    
        SolicitudMecanica::create([
            'user_id' => Auth::id(),
            'user_email' => Auth::user()->email,
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'modelo' => $request->modelo,
            'marca' => $request->marca,
            'tipo_problema' => $request->tipo_problema,
            'detalles_problema' => $request->detalles_problema,
            'descripcion' => $request->descripcion, // Agrega esta línea
            'ubicacion_usuario' => $request->ubicacion_usuario,
        ]);
    
        return redirect()->route('solicitudes.mecanica.historial')->with('success', 'Solicitud de mecánica enviada con éxito.');
    }
    
    public function historial()
    {
        $solicitudes = SolicitudMecanica::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('solicitudes.lugar', compact('solicitudes'));
    }
}
