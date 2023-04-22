<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{

    const CREATED_AT = 'creada';
    const UPDATED_AT = 'modificada';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titulo',
        'titulo_original',
        'pais',
        'duracion',
        'sinopsis',
        'fecha',
        'productora',
    ];
}
