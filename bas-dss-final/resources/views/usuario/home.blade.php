<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAS | Inicio</title>
    @include('templates.assets')
</head>
<body>
    @foreach ($user->toArray() as $propiedad => $valor)
        <p>{{$propiedad}} : {{$valor}}</p>
    @endforeach
</body>
</html>