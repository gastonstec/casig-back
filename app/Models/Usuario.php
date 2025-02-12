<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Usuario
 *
 * Representa a un usuario en el sistema, almacenado en la tabla `usuarios`.
 *
 * @package App\Models
 */
class Usuario extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada en la base de datos.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * Campos que pueden ser asignados masivamente (Mass Assignment).
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'supervisor',
        'centro',
        'correo',
        'ubicacion'
    ];
}
