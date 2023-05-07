<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Secuela
 *
 * @property int $saga_id
 * @property int $obra_id
 * @property int $orden
 * @property Carbon $creada
 * @property Carbon $modificada
 *
 * @property Obra $obra
 * @property Saga $saga
 *
 * @package App\Models
 */
class Secuela extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var integer
     */
    protected $primaryKey = 'obra_id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    const CREATED_AT = 'creada';
    const UPDATED_AT = 'modificada';

    /**
     * Castings
     *
     * @var string[]
     */
    protected $casts = [
        'saga_id' => 'int',
        'obra_id' => 'int',
        'orden' => 'int',
        'creada' => 'datetime',
        'modificada' => 'datetime'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'saga_id',
        'obra_id',
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
