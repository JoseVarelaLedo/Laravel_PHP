<div>
    <input type="tex" wire:model="note" />
    <button wire:click="store">Save Note</button>
    <p style="color:red"> {{ $feedback }}</p>
    @foreach ($notes as $note)
        <p style="color:blueviolet"> {{ $note->content }}</p>
        <button wire:click="update('{{ $note->id }}')">Update</button>
        <button wire:click="destroy('{{ $note->id }}')">Delete</button>
    @endforeach
</div>
