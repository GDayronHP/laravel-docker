<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    protected $table = 'libros';
    protected $fillable = ['isbn', 'nombre', 'descripcion'];

    public $timestamps = false;

    protected $primaryKey = 'isbn'; // Clave primaria personalizada
    public $incrementing = false; // Si no es autoincremental
    protected $keyType = 'string'; // Tipo de clave (si es cadena)

}
