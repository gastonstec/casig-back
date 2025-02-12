<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Clase de migración para la tabla "tecnicos".
 * 
 * Esta tabla almacena información de los técnicos, identificándolos mediante su correo electrónico.
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración para crear la tabla "tecnicos".
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tecnicos', function (Blueprint $table) {
            $table->id(); // Identificador único del técnico (autoincremental)
            $table->string('correo')->unique(); // Correo electrónico del técnico (único)
            $table->timestamps(); // Campos de timestamps (created_at y updated_at)
        });
    }

    /**
     * Revierte la migración eliminando la tabla "tecnicos".
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tecnicos');
    }
};
