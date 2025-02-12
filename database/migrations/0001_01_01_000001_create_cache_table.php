<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Clase de migración para la creación de las tablas de caché en la base de datos.
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración para crear las tablas `cache` y `cache_locks`.
     *
     * @return void
     */
    public function up(): void
    {
        // Creación de la tabla 'cache' para almacenar datos en caché
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary(); // Clave única que identifica cada caché
            $table->mediumText('value'); // Valor almacenado en la caché
            $table->integer('expiration'); // Tiempo de expiración del caché en segundos
        });

        // Creación de la tabla 'cache_locks' para gestionar bloqueos de caché
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary(); // Clave única para identificar bloqueos
            $table->string('owner'); // Identificador del propietario del bloqueo
            $table->integer('expiration'); // Tiempo de expiración del bloqueo en segundos
        });
    }

    /**
     * Revierte la migración eliminando las tablas creadas.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('cache'); // Elimina la tabla de caché
        Schema::dropIfExists('cache_locks'); // Elimina la tabla de bloqueos de caché
    }
};
