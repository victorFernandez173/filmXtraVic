<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
     * Get the Secuela that owns the obra.
     */
    public function secuela(): BelongsTo
    {
        return $this->belongsTo(Secuela::class);
    }

    /**
     * Get the Poster that owns the obra.
     */
    public function poster(): BelongsTo
    {
        return $this->belongsTo(Poster::class);
    }

    /**
     * Get the críticas for the obra.
     */
    public function criticas(): HasMany
    {
        return $this->hasMany(Critica::class);
    }

    /**
     * Get the críticas for the obra.
     */
    public function evaluaciones(): HasMany
    {
        return $this->hasMany(Evaluacion::class);
    }
}
