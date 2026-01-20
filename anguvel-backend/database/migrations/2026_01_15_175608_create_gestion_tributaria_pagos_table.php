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
        Schema::create('gestion_tributaria_pagos', function (Blueprint $table) {
            $table->increments('id_gestion_tributaria_pago');
            $table->string('codigo_contribuyente', 20);
            $table->string('periodo_tributario', 7); // e.g., 2024-01
            $table->string('tipo_impuesto', 100);
            $table->decimal('monto_pago', 15, 2);
            $table->date('fecha_pago');
            $table->string('metodo_pago', 50);
            $table->string('estado_cuenta', 50);
            $table->string('numero_recibo', 50)->unique()->nullable();
            $table->date('fecha_emision')->nullable();
            $table->decimal('importe_total', 15, 2)->nullable();
            $table->text('detalle_servicios')->nullable();
            $table->string('enlace_pdf', 255)->nullable();
            $table->string('tipo_beneficio', 100)->nullable();
            $table->text('descripcion_beneficio')->nullable();
            $table->decimal('descuento_aplicado', 15, 2)->nullable();
            $table->date('vigencia_beneficio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestion_tributaria_pagos');
    }
};
