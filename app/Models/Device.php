<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Device
 *
 * Represents a device within the system, stored in the 'dispositivos' table.
 *
 * @package App\Models
 */
class Device extends Model
{
    /**
     * Name of the table associated with the model.
     *
     * @var string
     */
    protected $table = 'dispositivos';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = [
        'numero_serie', // Device serial number
        'categoria'     // Device category
    ];
}
