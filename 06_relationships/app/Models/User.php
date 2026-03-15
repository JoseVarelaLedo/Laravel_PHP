<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function phones(): HasMany
    //public function phones(): HasOne
    {
        //return $this->hasOne(Phone::class);
        //en caso de no haber respetado la convención de nombres
        //habría que indicar la clave foránea de la entidad con la que se relaciona
        //y la propia clave primaria para establecer la relación
        //return $this->hasOne(Phone::class, 'user_id', 'id');
        return $this->hasMany(Phone::class);
    }

    public function roles(): BelongsToMany
    {
        //si respetamos la convención de nombres
        //añadimos el pivote o información extra
        return $this->belongsToMany(Role::class)->withPivot('added_by');
        //si no hubiese sido posible respetar la convención de nombres 
        //indicamos la tabla de intercambio, clave foránea y clave propia
        //return $this->belongsToMany(Role::class, 'role_user', 'role_id', 'user_id');
    }

    public function phoneSims(): HasManyThrough
    {
        //1er argumento la clase de destino final, Sim, con la que no tiene relación directa
        //2º argumento la clase con la que sí tiene relación, que las comunica
        return $this->hasManyThrough(Sim::class, Phone::class);

        //si no hubiésemos respetado la convención de nombres hab´ría que añadir las claves
    }

    public function image():MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
