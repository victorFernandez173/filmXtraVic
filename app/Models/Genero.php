<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Validation\Rules\Enum;

class Genero extends Model
{
    const CREATED_AT = 'creado';
    const UPDATED_AT = 'modificado';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'genero',
    ];
    /**
     * Get the director of the obra
     */
    public function obras(): BelongsToMany
    {
        return $this->belongsToMany(Obra::class);
    }
}
