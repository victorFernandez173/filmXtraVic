<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Saga extends Model
{

    const CREATED_AT = 'creada';
    const UPDATED_AT = 'modificada';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
    ];

    /**
     * Get the Secuelas of the saga.
     */
    public function secuela(): HasMany
    {
        return $this->hasMany(Secuela::class);
    }
}
