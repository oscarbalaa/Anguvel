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
        Schema::create('tramites_licencias', function (Blueprint $table) {
            $table->increments('id_tramites_licencias');
            $table->string('numero_expediente', 50)->unique()->nullable();
            $table->string('tipo_licencia', 100)->nullable();
            $table->string('area_responsable', 100)->nullable();
            $table->date('fecha_solicitud')->nullable();
            $table->string('estado_solicitud', 50)->nullable();
            $table->text('descripcion_solicitud')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->integer('dias_atraso')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('especialidad', 100)->nullable();
            $table->date('fecha_reserva')->nullable();
            $table->time('hora_reserva')->nullable();
            $table->string('estado_reserva', 50)->nullable();
            $table->text('requisitos')->nullable();
            $table->string('nombre_tramite', 255)->nullable();
            $table->decimal('costo_uit', 10, 2)->nullable();
            $table->string('plazo_respuesta', 50)->nullable();
            $table->date('fecha_emision')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->string('enlace_pdf', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramites_licencias');
    }
};
