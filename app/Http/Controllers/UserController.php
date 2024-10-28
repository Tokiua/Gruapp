<?php

// En app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function mostrarInformacion()
    {
        $usuario = Auth::user(); // Obtiene los datos del usuario autenticado
        return view('usuario.informacion', compact('usuario')); // Muestra la vista con los datos del usuario
    }
}
