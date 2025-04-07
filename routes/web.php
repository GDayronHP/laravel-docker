<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/libros/listar', [LibrosController::class,'listar'])->name('libros.listar');

Route::get('/libros/crear', [LibrosController::class, 'crear'])->name('libros.crear');
Route::post('/libros/guardar', [LibrosController::class, 'guardar'])->name('libros.guardar');

Route::get('/libros/{isbn}/editar', [LibrosController::class, 'editar'])->name('libros.editar');
Route::put('/libros/{isbn?}/actualizar', [LibrosController::class, 'actualizar'])->name('libros.actualizar');

Route::delete('/libros/{isbn?}/eliminar', [LibrosController::class, 'eliminar'])->name('libros.eliminar');

