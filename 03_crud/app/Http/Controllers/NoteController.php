<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Note;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{
    public function index(): View
    {
        $notes = Note::all();
        return view('note.index', compact('notes'));
    }

    public function create(): View
    {
        return view('note.create');
    }
    
    public function store(NoteRequest $request): RedirectResponse
    {     
       Note::create( $request -> all() );
        //una vez guardada la nota, redirigimos al index (nuestro 'home')
        return redirect()->route('note.index')->with('success', 'Note Created Succesfully');
    }

    public function edit (Note $note): View //recibimos una nota como argumento
    {        
        return view('note.edit', compact('note')); //haríamos un return de la nota a editar en una vista de formulario
    }

    public function update (NoteRequest $request, Note $note): RedirectResponse
    {
        $note-> update($request->all());
        return redirect()->route('note.index')->with('success', 'Note Edited Succesfully');
    }

    public function show (Note $note): View
    {
        return view('note.show', compact('note'));
    }

    public function destroy (Note $note): RedirectResponse
    {
        $note->delete();
        return redirect()->route('note.index')->with('danger', 'Note Erased Succesfully');
    }
}
