<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Festival extends Model
{
    const CREATED_AT = 'creada';
    const UPDATED_AT = 'modificada';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'edicion',
    ];

    public function obra(): BelongsTo
    {
        return $this->belongsTo(Obra::class);
    }
}
