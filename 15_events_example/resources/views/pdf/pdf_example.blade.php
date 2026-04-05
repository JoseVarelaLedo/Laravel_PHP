<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        .page-break{
            page-break-after: always;
        }
    </style>
</head>

<body>
    {{-- <h1>Hello World</h1> --}}
    {{-- <a href="{{ route('downloadPDF') }}">
        <button class="my-button"> Download PDF</button>
    </a> --}}
    <h1>Hello {{ $data }}</h1>
    <div class="page-break"></div>
    <h2>Hello in another page</h2>
</body>

</html>
