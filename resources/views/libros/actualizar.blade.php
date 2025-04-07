@extends('layouts.app')

@section('content')

<h1>Actualizar</h1>

<div>
    <div class="grid place-items-center w-screen h-screen bg-gray-200">
        <form action="{{ route('libros.actualizar', ['isbn' => $libro->isbn]) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="isbn" value="{{ $libro->isbn }}" readonly>
            <input type="text" name="nombre" value="{{ $libro->nombre }}" placeholder="Nombre del libro">
            <input type="text" name="descripcion" value="{{ $libro->descripcion }}" placeholder="Descripción del libro">
            <button type="submit">Actualizar</button>
        </form>
    </div>
</div>

@endsection
