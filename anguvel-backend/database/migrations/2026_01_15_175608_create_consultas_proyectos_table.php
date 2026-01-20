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
        Schema::create('consultas_proyectos', function (Blueprint $table) {
            $table->increments('id_consulta_proyecto');
            $table->string('codigo_snip', 20)->unique();
            $table->string('nombre_obra', 255);
            $table->decimal('presupuesto', 15, 2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('avance_fisico', 5, 2); // Percentage
            $table->decimal('avance_financiero', 5, 2); // Percentage
            $table->date('fecha_estimada_fin');
            $table->string('ruc', 11);
            $table->string('razon_social', 255);
            $table->string('nombre_supervisor', 255);
            $table->string('foto_antes', 255)->nullable();
            $table->string('foto_durante', 255)->nullable();
            $table->string('foto_finalizada', 255)->nullable();
            $table->date('fecha_antes_obra')->nullable();
            $table->date('fecha_durante_obra')->nullable();
            $table->date('fecha_finalizada_obra')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas_proyectos');
    }
};
