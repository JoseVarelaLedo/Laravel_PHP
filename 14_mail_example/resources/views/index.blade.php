<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Send me a mail</title>
        <style>
            * {
                margin: 10px;
                padding: 5px;
                box-sizing: bortder-box;
            }

            a {
                text-decoration: none;
                background-color: cadetblue;
                margin: 20px;
                padding: 15px;
                border-radius: 10px;
                color: #333;
                cursor: pointer;
            }

            a:hover {
                background-color: aquamarine;
            }
        </style>
    </head>

    <body>
        <a href="{{ route('mailMe') }}">Mail me</a>
    </body>

</html>
