<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Secuela extends Model
{
    const CREATED_AT = 'creada';
    const UPDATED_AT = 'modificada';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'orden',
    ];

    /**
     * Get the Saga associated with the Secuela.
     */
    public function saga(): BelongsTo
    {
        return $this->belongsTo(Saga::class);
    }

    /**
     * Get the Obra associated with the Secuela.
     */
    public function obra(): BelongsTo
    {
        return $this->belongsTo(Obra::class);
    }
}
