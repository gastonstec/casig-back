<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tecnico
 *
 * Representa a un técnico en el sistema, almacenado en la tabla 'tecnicos'.
 *
 * @package App\Models
 */
class Tecnico extends Model
{
    /**
     * Nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'tecnicos';

    /**
     * Campos asignables en masa (Mass Assignment).
     *
     * @var array
     */
    protected $fillable = [
        'correo' // Correo electrónico del técnico
    ];
}
