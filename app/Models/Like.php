<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    const CREATED_AT = 'creado';
    const UPDATED_AT = 'modificado';

    /**
     * Get the critica associated with the like.
     */
    public function critica(): BelongsTo
    {
        return $this->belongsTo(Critica::class);
    }

    /**
     * Get the usuario associated with the like.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
