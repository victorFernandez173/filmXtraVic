<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $apellido
 * @property Carbon|null $edad
 * @property string|null $pais
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon $creado
 * @property Carbon $modificado
 *
 * @property Collection|Critica[] $criticas
 * @property Collection|Evaluacion[] $evaluaciones
 * @property Collection|Like[] $likes
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Atributos asignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'age',
        'country',
        'email',
        'password',
    ];

    /**
     * Atributos escondidos.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Castings.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'age' => 'datetime',
        'creado' => 'datetime',
        'modificado' => 'datetime',
        'email_verified_at' => 'timestamp',
    ];

    /**
     * Obtiene las críticas.
     */
    public function criticas(): HasMany
    {
        return $this->hasMany(Critica::class);
    }

    /**
     * Obtiene las evaluaciones.
     */
    public function evaluaciones(): HasMany
    {
        return $this->hasMany(Evaluacion::class);
    }

    /**
     * Obtiene los likes.
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(Critica::class, 'likes', 'user_id', 'critica_id', 'id', );
    }
}
