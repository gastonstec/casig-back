<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EndUser
 *
 * Represents an end user in the system, stored in the `usuarios` table.
 */
class EndUser extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; // ✅ Keeps the same database table name

    protected $fillable = [
        'nombre',
        'supervisor',
        'centro',
        'correo',
        'ubicacion'
    ];
}
