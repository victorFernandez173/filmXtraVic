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

	protected $casts = [
		'obra_id' => 'int',
		'genero_id' => 'int'
	];

	public function genero(): BelongsTo
	{
		return $this->belongsTo(Genero::class);
	}

	public function obra(): BelongsTo
	{
		return $this->belongsTo(Obra::class);
	}
}
