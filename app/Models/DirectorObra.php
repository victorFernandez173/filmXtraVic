<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

	protected $casts = [
		'director_id' => 'int',
		'obra_id' => 'int'
	];

	public function director()
	{
		return $this->belongsTo(Director::class);
	}

	public function obra()
	{
		return $this->belongsTo(Obra::class);
	}
}
