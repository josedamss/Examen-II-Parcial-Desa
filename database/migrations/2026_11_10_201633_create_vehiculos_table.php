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
    Schema::create('vehiculos', function (Blueprint $table) {
        $table->id();
        $table->string('numero_placa', 15)->unique();
        $table->string('marca', 50);
        $table->string('modelo', 80);
        $table->string('tipo_vehiculo', 50);
        $table->string('color', 30);
        $table->integer('capacidad');
        $table->decimal('tarifa_diaria', 10, 2);
        $table->string('estado', 30)->default('Disponible');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
