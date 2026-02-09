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
        Schema::create('servicio_tallers', function (Blueprint $table) {
            $table->id();
            $table->string('cliente');
            $table->string('moto_modelo');
            $table->text('descripcion_servicio');
            $table->date('fecha_ingreso');
            $table->date('fecha_entrega')->nullable();
            $table->enum('estado', ['pendiente', 'en_proceso', 'finalizado'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio_tallers');
    }
};
