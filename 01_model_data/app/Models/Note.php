<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
Se podrán hacer operciones del tipo:
$note = new Note();
$note -> title = "Primera nota";
$note -> description = "Primera nota que creamos hacia el motor de persistencia");
(...)
al finalizar:
note.save();
*/

class Note extends Model
{
    use HasFactory;
    //protected $table = "el nombre que tenga la tabla";    
    protected $fillable = ['title', 'description', 'deadline', 'done'];
    protected $guarded = [];
    protected $casts = ['deadline' => "date"];
    protected $hidden = [];
}

