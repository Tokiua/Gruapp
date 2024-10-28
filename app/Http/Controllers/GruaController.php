<?php



namespace App\Http\Controllers;

use App\Models\Taller;
use Illuminate\Http\Request;

class GruaController extends Controller
{
    // Mostrar el formulario de solicitud de servicio de grúa
    public function showForm()
    {
        $talleres = Taller::all(); // Obtener todos los talleres de la base de datos
        return view('formularios.grua', compact('talleres'));
    }

    // Manejar la solicitud de servicio de grúa
    public function requestService(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'tipo_vehiculo' => 'required|string',
            'placa' => 'required|string|max:10',
            'descripcion' => 'required|string',
            'direccion_destino' => 'required|string|max:255',
            'taller_id' => 'required|array'
        ]);

        // Aquí puedes almacenar la solicitud en la base de datos si lo deseas

        // Redirigir a una vista de confirmación o en proceso
        return redirect()->route('solicitud.proceso')->with('success', 'Solicitud enviada con éxito.');
    }

    // Mostrar la vista de solicitud en proceso
    public function showProcess()
    {
        return view('solicitudes.proceso'); // Crear esta vista para mostrar el estado de la solicitud
    }
    
    public function mostrarMapa($id)
    {
        $taller = Taller::findOrFail($id);
        return view('maps.mapscom', compact('taller'));
    }
}
