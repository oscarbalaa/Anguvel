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
        Schema::create('reporte_incidencias', function (Blueprint $table) {
            $table->increments('id_reporte_incidencia');
            $table->string('categoria', 100);
            $table->text('descripcion');
            $table->string('ubicacion_incidencia', 255);
            $table->date('fecha_incidencia');
            $table->time('hora_incidencia');
            $table->string('foto_adjunta', 255)->nullable();
            $table->string('numero_ticket', 50)->unique()->nullable();
            $table->string('estado', 50)->nullable(); // pendiente/en proceso/resuelto
            $table->string('ubicacion_mapa', 255)->nullable();
            $table->string('empresa_ejecutora', 255)->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporte_incidencias');
    }
};
