<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Clase de migración para la creación de tablas relacionadas con la autenticación de usuarios.
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración para crear las tablas `users`, `password_reset_tokens` y `sessions`.
     *
     * @return void
     */
    public function up(): void
    {
        // Creación de la tabla 'users'
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Clave primaria auto-incremental
            $table->string('name'); // Nombre del usuario
            $table->string('email')->unique(); // Correo electrónico único
            $table->timestamp('email_verified_at')->nullable(); // Fecha de verificación del email
            $table->string('password'); // Contraseña encriptada
            $table->rememberToken(); // Token para la funcionalidad "recordarme"
            $table->timestamps(); // Fechas de creación y actualización del usuario
        });

        // Creación de la tabla 'password_reset_tokens' para gestionar restablecimientos de contraseña
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Clave primaria basada en el correo electrónico
            $table->string('token'); // Token de restablecimiento de contraseña
            $table->timestamp('created_at')->nullable(); // Fecha de creación del token
        });

        // Creación de la tabla 'sessions' para almacenar sesiones de usuarios
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Identificador único de sesión
            $table->foreignId('user_id')->nullable()->index(); // Relación con la tabla `users`
            $table->string('ip_address', 45)->nullable(); // Dirección IP del usuario
            $table->text('user_agent')->nullable(); // Información del navegador/dispositivo
            $table->longText('payload'); // Datos de la sesión serializados
            $table->integer('last_activity')->index(); // Última actividad de la sesión
        });
    }

    /**
     * Revierte la migración eliminando las tablas creadas.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // Elimina la tabla de usuarios
        Schema::dropIfExists('password_reset_tokens'); // Elimina la tabla de restablecimiento de contraseñas
        Schema::dropIfExists('sessions'); // Elimina la tabla de sesiones
    }
};
