<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SISTEMA CRUD CON LARAVEL - DOCKER</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('libros.listar') }}">Home</a></li>
            <li><a href="{{ route('libros.crear') }}">Crear</a></li>
            <li><a href="{{ route('libros.actualizar') }}">Actualizar</a></li>
            <li><a href="{{ route('libros.eliminar') }}">Eliminar</a></li>
        </ul>
    </nav>
    @yield('content')
</body>
</html>