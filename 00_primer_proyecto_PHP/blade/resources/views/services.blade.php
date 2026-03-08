@extends('/layouts.landing')

@section('title', 'Services')

@section('content')
    <h1>Services</h1>
    @component('_components.card')
        @slot('title', 'Service One')
        @slot('content', 'Contenido del service one')
    @endcomponent

     @component('_components.card')
        @slot('title', 'Service Two')
        @slot('content')
            <h3>Service 2 title</h3>
            <p><em>Contenido del service two</em></p>
        @endslot
    @endcomponent
@endsection

{{-- @section('styles')
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css')  }}">
@endsection --}}