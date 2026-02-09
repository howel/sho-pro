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
        Schema::create('venta_repuestos', function (Blueprint $table) {
        $table->id();
        $table->string('cliente');
        $table->foreignId('repuesto_id')->constrained('products')->cascadeOnDelete();
        $table->integer('cantidad')->default(1);
        $table->decimal('precio', 10, 2);
        $table->date('fecha_venta');
        $table->enum('estado', ['pendiente', 'pagado', 'cancelado'])->default('pendiente');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_repuestos');
    }
};
