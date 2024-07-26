<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <a href="{{ route('test') }}?time=day">day</a>
    <a href="{{ route('test') }}?time=week">week</a>
    Revenue: {{ $revenue }}
</body>

</html>
