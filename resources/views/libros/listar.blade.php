@extends('layouts.app')
@section('content')
<h1>Listado de libros</h1>
    <div class="grid place-items-center w-screen h-screen bg-gray-200">
        <table class="table-aut o border-collapse border border-gray-400">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Título</th>
                    <th class="border border-gray-300 px-4 py-2">Autor</th>
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $libro->isbn }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $libro->nombre }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $libro->descripcion }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('libros.editar', $libro->isbn) }}" class="text-blue-500 hover:underline">Editar</a> |
                            <form method="POST" action="{{ route('libros.eliminar', ['isbn' => $libro->isbn]) }}">
                                @csrf
                                @method('DELETE') 
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection