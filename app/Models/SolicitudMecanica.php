<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudMecanica extends Model
{
    use HasFactory;

    // Cambia el nombre de la tabla si es necesario
    protected $table = 'solicitudes_mecanica';

    protected $fillable = [
        'user_id',
        'user_email',
        'nombre',
        'telefono',
        'modelo',
        'marca',
        'tipo_problema',
        'detalles_problema',
        'descripcion', // Agrega este campo
        'ubicacion_usuario',
    ];
    
}
