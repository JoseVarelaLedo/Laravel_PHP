<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index() 
    {
        $notes = Note::all();
        return view('note.index', compact('notes'));
    }

    public function create()
    {
        return view('note.create');
    }
    
    public function store(Request $request)
    {
       Note::create( $request -> all() );
        //una vez guardada la nota, redirigimos al index (nuestro 'home')
        return redirect()->route('note.index');
    }

    public function edit (Note $note) //recibimos una nota como argumento
    {        
        return view('note.edit', compact('note')); //haríamos un return de la nota a editar en una vista de formulario
    }
}
