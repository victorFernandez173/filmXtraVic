<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Like
 *
 * @property int $user_id
 * @property int $critica_id
 *
 * @property Critica $critica
 * @property User $user
 *
 * @package App\Models
 */
class Like extends Model
{
	protected $table = 'likes';
	public $incrementing = false;
	public $timestamps = false;

    /**
     * Castings
     *
     * @var string[]
     */
	protected $casts = [
		'user_id' => 'int',
		'critica_id' => 'int'
	];

    /**
     * Obtiene la critica
     *
     * @return BelongsTo
     */
	public function critica(): BelongsTo
	{
		return $this->belongsTo(Critica::class);
	}

    /**
     * Obtiene el usuario
     *
     * @return BelongsTo
     */
	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
