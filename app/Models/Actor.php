<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Actor extends Model
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
        'nombre_real',
        'edad',
        'pais',
        'defuncion'
    ];

    /**
     * Get the director of the obra
     */
    public function obras(): BelongsToMany
    {
        return $this->belongsToMany(Obra::class);
    }
}
