<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evaluacion extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'evaluaciones';

    const CREATED_AT = 'creada';
    const UPDATED_AT = 'modificada';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'evaluacion',
    ];

    /**
     * Get the obra associated with the evaluación.
     */
    public function obra(): BelongsTo
    {
        return $this->belongsTo(Obra::class);
    }

    /**
     * Get the user associated with the evaluación.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
