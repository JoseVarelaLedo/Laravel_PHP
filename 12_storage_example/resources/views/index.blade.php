<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Info Index</title>
</head>
<body>   
    <a href=" {{ 'create' }}">Create Info</a>
    <h3> Info List </h3>
    <ul>
        @forelse ($infos as $info)
            {{-- <li>File: {{ $info->name }} {{ $info->file_uri }}</li>--}}
            <li><img src="{{ asset('storage/images/'.$info->file_uri) }}" width="100" alt="{{ $info->name}}"></li>
        @empty
            <li>No data</li>
        @endforelse
    </ul>
</body>
</html>