<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Technician
 *
 * Represents a technician in the system, stored in the 'tecnicos' table.
 *
 * @package App\Models
 */
class Technician extends Model
{
    /**
     * Name of the table associated with the model.
     *
     * @var string
     */
    protected $table = 'tecnicos';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = [
        'correo' // Technician's email
    ];
}
