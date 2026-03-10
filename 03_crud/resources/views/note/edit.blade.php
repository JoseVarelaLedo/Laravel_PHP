@extends('layouts.app')

@section('content')
    <a href="{{ route('note.index') }}">Home</a>
    <form method="POST" action="#">
        @csrf
        <label>Title:</label>
        <!-- Recuperamos el valor título de la nota  -->
        <input type="text" name="title" value="{{ $note -> title }}"/>

        <label>Description:</label>
        <!-- Recuperamos el valor descripción de la nota  -->
        <input type="text" name="description" value="{{ $note -> description }}"/>

        <input type="submit" value="Update"/>
    </form>    
@endsection 