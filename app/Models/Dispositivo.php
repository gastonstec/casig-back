<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dispositivo
 *
 * Representa un dispositivo dentro del sistema, almacenado en la tabla 'dispositivos'.
 *
 * @package App\Models
 */
class Dispositivo extends Model
{
    /**
     * Nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'dispositivos';

    /**
     * Campos asignables en masa (Mass Assignment).
     *
     * @var array
     */
    protected $fillable = [
        'numero_serie', // Número de serie del dispositivo
        'categoria'     // Categoría del dispositivo
    ];
}
