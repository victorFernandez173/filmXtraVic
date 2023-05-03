<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

	protected $casts = [
		'user_id' => 'int',
		'critica_id' => 'int'
	];

	public function critica()
	{
		return $this->belongsTo(Critica::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
