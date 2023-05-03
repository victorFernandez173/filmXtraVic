<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ActorObra
 *
 * @property int $obra_id
 * @property int $actor_id
 *
 * @property Actor $actor
 * @property Obra $obra
 *
 * @package App\Models
 */
class ActorObra extends Model
{
	protected $table = 'actor_obra';
	public $incrementing = false;
	public $timestamps = false;

    /**
     * Castings
     *
     * @var string[]
     */
	protected $casts = [
		'obra_id' => 'int',
		'actor_id' => 'int'
	];

    /**
     * Obtiene el actor
     *
     * @return BelongsTo
     */
	public function actor(): BelongsTo
	{
		return $this->belongsTo(Actor::class);
	}

    /**
     * Obtiene la obra
     *
     * @return BelongsTo
     */
	public function obra(): BelongsTo
	{
		return $this->belongsTo(Obra::class);
	}
}
