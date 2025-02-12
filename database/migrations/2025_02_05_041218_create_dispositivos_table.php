<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Clase de migración para la tabla "dispositivos".
 * 
 * Esta tabla almacena información sobre los dispositivos, incluyendo su número de serie y categoría.
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración para crear la tabla "dispositivos".
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id(); // Identificador único del dispositivo (autoincremental)
            $table->string('numero_serie')->unique(); // Número de serie único del dispositivo
            $table->string('categoria'); // Categoría a la que pertenece el dispositivo
            $table->timestamps(); // Campos de timestamps (created_at y updated_at)
        });
    }

    /**
     * Revierte la migración eliminando la tabla "dispositivos".
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivos');
    }
};
