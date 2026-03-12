@extends('layouts.app')

@section('content')
    <a href="{{ route('note.index') }}">Home</a>
    <form method="POST" action="{{ route('note.update', $note->id) }}">
        @method ('PUT')
        @csrf
        <label>Title:</label>
        <!-- Recuperamos el valor título de la nota  -->
        <input type="text" name="title" value="{{ $note->title }}" />
        @error('title')
            <br>
            <p style="color:red">{{ $message }}</p>
        @enderror

        <label>Description:</label>
        <!-- Recuperamos el valor descripción de la nota  -->
        <input type="text" name="description" value="{{ $note->description }}" />
        @error('description')
            <br>
            <p style="color:red">{{ $message }}</p>
        @enderror
        <input type="submit" value="Update" />
    </form>
@endsection
