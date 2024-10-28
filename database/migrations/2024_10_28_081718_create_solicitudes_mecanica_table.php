<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesMecanicaTable extends Migration
{
    public function up()
    {
        Schema::create('solicitudes_mecanica', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('user_email');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('modelo');
            $table->string('marca');
            $table->string('descripcion');
            $table->string('tipo_problema');
            $table->text('detalles_problema')->nullable();
            $table->string('ubicacion_usuario'); // Columna para la ubicación del usuario
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitudes_mecanica');
    }
}
