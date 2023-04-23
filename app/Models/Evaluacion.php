<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    /*public function obra(): HasOne
    {
        return $this->hasOne(Obra::class);
    }*/
}
