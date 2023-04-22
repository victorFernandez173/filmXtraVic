<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{

    const CREATED_AT = 'creado';
    const UPDATED_AT = 'modificado';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'evaluacion',
        'apellido',
        'edad',
    ];
}
