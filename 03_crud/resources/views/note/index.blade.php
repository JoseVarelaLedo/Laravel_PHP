@extends('layouts.app')

@section('content')
    <a href="{{ route('note.create') }}">Create Note</a>
    <ul>
        @forelse ($notes as $note)
            <li> <a href="#"> {{ $note -> title }} </a>
                <!-- enlace de edición, el segundo parámetro de route es el array -->
                <a href=" {{ route('note.edit', $note->id) }}"> EDIT </a>
                <!-- enlace de borrado, aún por definir -->
                <a href=" #"> DELETE </a>
            </li>
        @empty
            <p><em>no data</em></p>
        @endforelse
    </ul>
@endsection