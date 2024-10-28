<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudGrua extends Model
{
    use HasFactory;

    protected $table = 'solicitud_gruas';

    protected $fillable = [
        'nombre',
        'telefono',
        'marca',
        'modelo',
        'tipo_vehiculo',
        'placa',
        'descripcion',
        'direccion_destino',
        'ubicacion_usuario',
        'taller_id',
        'user_email',
        'estado'
    ];

    public function taller()
    {
        return $this->belongsTo(Taller::class, 'taller_id');
    }

    public function isFinalizado()
    {
        return $this->estado === 'finalizado';
    }

    public function cambiarEstado($nuevoEstado)
    {
        if (in_array($nuevoEstado, ['en_revision', 'proceso', 'finalizado'])) {
            $this->estado = $nuevoEstado;
            $this->save();
        }
    }
}
