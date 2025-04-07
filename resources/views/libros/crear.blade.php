@extends('layouts.app')
@section('content')

<h1>Crear libro</h1>

    <div class="grid place-items-center w-screen h-screen bg-gray-200">
        <h1 class="text-bold text-black">Soy un parrafo diseñado con tailwindcss</h1>
        <form action="{{ route('libros.guardar')}}" method="POST">
            @csrf
            <input type="text" name="isbn" placeholder="ISBN del libro">
            <input type="text" name="nombre" placeholder="Nombre del libro">
            <input type="text" name="descripcion" placeholder="Descripcion del libro">
            <button type="submit">Crear</button>
        </form>
    </div>
@endsection