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
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'director_obra';

    /**
     * primaryKey
     *
     * @var null
     * @access protected
     */
    protected $primaryKey = null;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * No timestamps
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var int[]
     */
    protected $fillable = [
        'director_id',
        'obra_id',
    ];

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
