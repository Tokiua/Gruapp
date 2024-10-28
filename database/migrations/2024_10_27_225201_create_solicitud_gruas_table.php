<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudGruasTable extends Migration
{
    public function up()
    {
        Schema::create('solicitud_gruas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Agrega esta línea
            $table->string('nombre');
            $table->string('telefono');
            $table->string('marca');
            $table->string('modelo');
            $table->enum('tipo_vehiculo', ['ligero', 'pesado', 'motocicleta']);
            $table->string('placa');
            $table->text('descripcion');
            $table->string('direccion_destino')->nullable();
            $table->string('ubicacion_usuario')->nullable(); // Para almacenar la ubicación del usuario
            $table->unsignedBigInteger('taller_id')->nullable(); // ID del taller seleccionado
            $table->string('user_email'); // Correo del usuario
            $table->enum('estado', ['en_revision', 'proceso', 'finalizado'])->default('en_revision'); // Estado de la solicitud
            $table->timestamps(); // Crea los campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitud_gruas');
    }
}
