<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class DirectorObra
 *
 * @property int $director_id
 * @property int $obra_id
 *
 * @property Director $director
 * @property Obra $obra
 *
 * @package App\Models
 */
class DirectorObra extends Model
{
	protected $table = 'director_obra';
	public $incrementing = false;
	public $timestamps = false;

    /**
     * Castings
     *
     * @var string[]
     */
	protected $casts = [
		'director_id' => 'int',
		'obra_id' => 'int'
	];

    /**
     * Obtiene el director
     *
     * @return BelongsTo
     */
	public function director(): BelongsTo
	{
		return $this->belongsTo(Director::class);
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
