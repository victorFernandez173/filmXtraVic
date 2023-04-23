<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Poster extends Model
{
    const CREATED_AT = 'creado';
    const UPDATED_AT = 'modificado';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ruta',
        'alt'
    ];

    /**
     * Get the obra associated with the poster.
     */
    /*public function obra(): HasOne
    {
        return $this->hasOne(Obra::class);
    }*/
}
