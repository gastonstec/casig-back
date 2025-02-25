<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

/**
 * Class User
 *
 * Represents an authenticated user in the system.
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'google_id'];

    /**
     * Fields that should remain hidden in JSON serializations.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Attribute type casting.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
