<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Director extends Model
{
    const CREATED_AT = 'creado';
    const UPDATED_AT = 'modificado';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'pais',
        'defuncion'
    ];

    /**
     * Get the obras of the director
     * @return BelongsToMany
     */
    public function obras(): BelongsToMany
    {
        return $this->belongsToMany(Obra::class);
    }
}
