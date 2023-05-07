<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class GeneroObra
 *
 * @property int $obra_id
 * @property int $genero_id
 *
 * @property Genero $genero
 * @property Obra $obra
 *
 * @package App\Models
 */
class GeneroObra extends Model
{
	protected $table = 'genero_obra';
	public $incrementing = false;
	public $timestamps = false;

    /**
     * Castings
     *
     * @var string[]
     */
	protected $casts = [
		'obra_id' => 'int',
		'genero_id' => 'int'
	];

    /**
     * Obtiene el genero
     *
     * @return BelongsTo
     */
	public function genero(): BelongsTo
	{
		return $this->belongsTo(Genero::class);
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
