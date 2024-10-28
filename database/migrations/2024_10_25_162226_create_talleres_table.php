

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalleresTable extends Migration
{
    public function up()
    {
        Schema::create('talleres', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->json('servicios');
            $table->decimal('latitud', 10, 7);
            $table->decimal('longitud', 10, 7);
            $table->string('telefono'); // Agregar columna de teléfono
            $table->string('email')->unique(); // Agregar columna de correo electrónico
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('talleres');
    }
}
