<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Note;

class NoteComponent extends Component
{
    public $note = '';
    public $feedback = '';

    public function store()
    {
        Note::create([
            //el contenido va a ser bindeado desde la bista
            'content' => $this->note
        ]);
        $this->feedback = 'Note created';
    }

    public function update($id)
    {
        $noteToUpdate = Note::find($id);
        $noteToUpdate->content = $this->note;
        $noteToUpdate->save();
        $this->feedback = "Note updated";
    }

    public function destroy($id)
    {
        Note::destroy($id);
        $this->feedback = "Note deleted";
    }
    public function render()
    {
        $notes = Note::all();
        return view('livewire.note-component', compact('notes'));
    }
}
