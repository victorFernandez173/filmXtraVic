<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Critica extends Model
{
    const CREATED_AT = 'creado';
    const UPDATED_AT = 'modificado';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'obra_cine',
        'usuario',
        'critica',
    ];


}
