<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudEmergencia extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_emergencia'; // Asegúrate de que esté definido

    protected $fillable = [
        'user_id',
        'user_email',
        'nombre',
        'telefono',
        'descripcion',
        'ubicacion_usuario',
        'direccion_destino',
    ];
}
