<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    use HasFactory;

    protected $table = 'talleres';

    protected $fillable = [
        'nombre',
        'descripcion',
        'servicios',
        'latitud',
        'longitud',
        'telefono',
        'email',
    ];

    // Accesor para obtener los servicios como un array
    public function getServiciosAttribute($value)
    {
        return json_decode($value);
    }
}
