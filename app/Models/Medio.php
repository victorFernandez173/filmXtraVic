<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medio extends Model
{
    const CREATED_AT = 'creado';
    const UPDATED_AT = 'modificado';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nombre',
        'web',
    ];

    /**
     * Get the profesionals for the obra.
     */
    public function profesionals(): HasMany
    {
        return $this->hasMany(Profesional::class);
    }
}
