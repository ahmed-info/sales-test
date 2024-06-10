<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{ $department->title}}
    <hr>
    @foreach ($department->subdepartments as $subpepart)
    <h1>{{ $subpepart->subtitle }}</h1>

    @endforeach
</body>

</html>