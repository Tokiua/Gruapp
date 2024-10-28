<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesEmergenciaTable extends Migration
{
    public function up()
    {
        Schema::create('solicitudes_emergencia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('user_email');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('descripcion');
            $table->string('ubicacion_usuario');
            $table->string('direccion_destino')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitudes_emergencia');
    }
}
