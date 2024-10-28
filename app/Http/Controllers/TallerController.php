<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use Illuminate\Http\Request;

class TallerController extends Controller
{
    public function index()
    {
        // Obtener todos los talleres
        $talleres = Taller::all();
        return view('talleres.taller', compact('talleres')); // Ajustado aquí
    }
    public function mostrarMapa($id)
{
    $taller = Taller::findOrFail($id);
    return view('maps.talleresmap', compact('taller'));
}

}

