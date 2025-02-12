<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Clase de migración para la tabla "usuarios".
 * 
 * Esta tabla almacena información de los usuarios, incluyendo su nombre, supervisor,
 * centro de trabajo, correo electrónico y ubicación.
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración para crear la tabla "usuarios".
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // Identificador único del usuario
            $table->string('nombre'); // Nombre completo del usuario
            $table->string('supervisor'); // Nombre del supervisor directo
            $table->string('centro'); // Centro de trabajo al que pertenece
            $table->string('correo')->unique(); // Correo electrónico (único por usuario)
            $table->string('ubicacion'); // Ubicación física del usuario
            $table->timestamps(); // Campos de timestamps (created_at y updated_at)
        });
    }

    /**
     * Revierte la migración eliminando la tabla "usuarios".
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
