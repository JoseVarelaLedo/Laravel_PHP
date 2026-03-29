<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create</title>
    </head>
    <body>
        <a href=" {{ 'index' }}">Back To Index</a>
        <br/>
        <form method="POST" action=" {{ route('store') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="name"/> <br/>
            <input type="file" name="file" placeholder="file"/><br/>
            <input type="submit" value="send"/><br/>
        </form>
    </body>
</html>