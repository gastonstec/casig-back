<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * Representa a un usuario autenticado en el sistema.
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * Campos que pueden ser asignados masivamente (Mass Assignment).
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'google_id'];

    /**
     * Campos que deben permanecer ocultos en serializaciones JSON.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Conversión de tipos de atributos.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
