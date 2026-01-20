<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seguridad_ciudadana', function (Blueprint $table) {
            $table->increments('id_seguridad_ciudadana');
            $table->unsignedInteger('id_usuario');
            $table->string('ubicacion', 255);
            $table->string('tipo_riesgo', 100);
            $table->date('fecha_riesgo');
            $table->time('hora_riesgo');
            $table->text('descripcion');
            $table->string('nombre_entidad', 100)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('correo', 100)->nullable();
            $table->string('ubicacion_riesgo', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguridad_ciudadana');
    }
};
