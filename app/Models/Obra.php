<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    /**
     * Get the secuelas of the obra.
     */
    public function secuelas(): HasMany
    {
        return $this->hasMany(Secuela::class);
    }

    /**
     * Get the Poster associated with the obra.
     */
    public function poster(): HasOne
    {
        return $this->hasOne(Poster::class);
    }

    /**
     * Get the críticas for the obra.
     */
    public function criticas(): HasMany
    {
        return $this->hasMany(Critica::class);
    }

    /**
     * Get the evaluaciones for the obra.
     */
    public function evaluaciones(): HasMany
    {
        return $this->hasMany(Evaluacion::class);
    }

    /**
     * Get the director of the obra
     */
    public function directors(): BelongsToMany
    {
        return $this->belongsToMany(Director::class);
    }

    /**
     * Get the críticas for the obra.
     */
    public function festivals(): HasMany
    {
        return $this->hasMany(Festival::class);
    }
}
