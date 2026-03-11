@extends('layouts.app')

@section('content')
    <a href="{{ route('note.create') }}">Create Note</a>
    <ul>
        @forelse ($notes as $note)
            <li> <a href=" {{ route('note.show', $note->id) }}"> {{ $note -> title }} </a>               
                <!-- enlace de edición, el segundo parámetro de route es el array -->
                <a href=" {{ route('note.edit', $note->id) }}"> EDIT </a>
                <!-- bloque para borrado, tiene que ser un form porque DELETE es variante de POST -->
                <form method="POST" action=" {{ route('note.destroy', $note->id) }}"> 
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="DELETE" />
                </form>
                <!-- <br><em>{{ $note->description }}</em> -->
            </li>
        @empty
            <p><em>no data</em></p>
        @endforelse
    </ul>
@endsection