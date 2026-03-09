<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>User list:</h1>   
    <ul>
        @forelse ($users as $user)
            <li> {{ $user -> name }}, edad: {{ $user -> age }}</li>
            @empty
            <p><em>The list is empty</em></p>
        @endforelse
    </ul>  
</body>
</html>