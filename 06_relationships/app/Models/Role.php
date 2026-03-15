<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $guarded = [];

    public function users(): BelongsToMany
    {
        //si respetamos la convención de nombres
        //return $this->belongsToMany(User::class);
        //si no hubiese sido posible respetar la convención de nombres 
        //indicamos la tabla de intercambio, clave foránea y clave propia
        //return $this->belongsToMany(User::class, 'role_user', 'user_id', 'role_id');

        //si hemos definido información extra nos la podemos traer también
        return $this->belongsToMany(User::class)->withPivot('added_by');
    }
}
