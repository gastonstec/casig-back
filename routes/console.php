<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Definición de Comandos Artisan Personalizados
|--------------------------------------------------------------------------
|
| Este archivo permite registrar comandos de consola personalizados que 
| pueden ejecutarse a través de Artisan en Laravel. 
| En este caso, se define un comando que muestra una cita inspiradora.
|
*/

/**
 * Comando personalizado: "php artisan inspire"
 *
 * Este comando mostrará una cita motivacional aleatoria cada vez que se ejecute.
 * 
 * Uso en terminal:
 *   php artisan inspire
 */
Artisan::command('inspire', function () {
    // Muestra una cita inspiradora en la terminal
    $this->comment(Inspiring::quote());
})->purpose('Muestra una cita inspiradora en la consola.');
