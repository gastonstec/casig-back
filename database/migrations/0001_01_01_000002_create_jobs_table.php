<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Clase de migración para la creación de tablas relacionadas con la gestión de trabajos en cola.
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración para crear las tablas `jobs`, `job_batches` y `failed_jobs`.
     *
     * @return void
     */
    public function up(): void
    {
        // Creación de la tabla 'jobs' para almacenar trabajos en cola
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // Identificador único del trabajo
            $table->string('queue')->index(); // Nombre de la cola en la que se encuentra el trabajo
            $table->longText('payload'); // Información del trabajo serializada
            $table->unsignedTinyInteger('attempts'); // Número de intentos de ejecución
            $table->unsignedInteger('reserved_at')->nullable(); // Fecha en la que el trabajo fue reservado
            $table->unsignedInteger('available_at'); // Fecha en la que el trabajo estará disponible
            $table->unsignedInteger('created_at'); // Fecha de creación del trabajo
        });

        // Creación de la tabla 'job_batches' para gestionar lotes de trabajos en cola
        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary(); // Identificador único del lote
            $table->string('name'); // Nombre del lote de trabajos
            $table->integer('total_jobs'); // Cantidad total de trabajos en el lote
            $table->integer('pending_jobs'); // Cantidad de trabajos pendientes
            $table->integer('failed_jobs'); // Cantidad de trabajos fallidos
            $table->longText('failed_job_ids'); // Lista de IDs de trabajos fallidos
            $table->mediumText('options')->nullable(); // Opciones adicionales del lote
            $table->integer('cancelled_at')->nullable(); // Fecha de cancelación del lote
            $table->integer('created_at'); // Fecha de creación del lote
            $table->integer('finished_at')->nullable(); // Fecha de finalización del lote
        });

        // Creación de la tabla 'failed_jobs' para registrar trabajos fallidos
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id(); // Identificador único del trabajo fallido
            $table->string('uuid')->unique(); // Identificador único universal del trabajo
            $table->text('connection'); // Conexión utilizada para la cola
            $table->text('queue'); // Nombre de la cola
            $table->longText('payload'); // Información del trabajo serializada
            $table->longText('exception'); // Mensaje de error asociado al fallo
            $table->timestamp('failed_at')->useCurrent(); // Fecha y hora en la que falló el trabajo
        });
    }

    /**
     * Revierte la migración eliminando las tablas creadas.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs'); // Elimina la tabla de trabajos en cola
        Schema::dropIfExists('job_batches'); // Elimina la tabla de lotes de trabajos
        Schema::dropIfExists('failed_jobs'); // Elimina la tabla de trabajos fallidos
    }
};
