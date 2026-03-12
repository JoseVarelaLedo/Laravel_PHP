@extends ('layouts.app')

@section('content')
   
    <a href="{{ route('note.index') }}">Home</a>
    <form method="POST" action="{{ route('note.store') }}">
        @csrf
        <label>Title:</label>
        <input type="text" name="title"/>
        @error('title')
            <br>
            <p style="color:red">{{ $message }}</p>
        @enderror

        <label>Description:</label>
        <input type="text" name="description"/>
         @error('description')
            <br>
            <p style="color:red">{{ $message }}</p>
        @enderror
        <input type="submit" value="Create"/>
    </form>    
@endsection