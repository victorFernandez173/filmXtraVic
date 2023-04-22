<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Critica extends Model
{
    const CREATED_AT = 'creada';
    const UPDATED_AT = 'modificada';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'critica',
    ];

    /**
     * Get the obra associated with the crítica.
     */
    public function obra(): HasOne
    {
        return $this->hasOne(Obra::class);
    }

    /**
     * Get the usuario associated with the crítica.
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
