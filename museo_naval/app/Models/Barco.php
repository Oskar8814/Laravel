<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barco extends Model {
    use HasFactory;

    protected $table = 'barcos';

    protected $fillable = ['nombre', 'clase', 'nacionalidad', 'descripcion', 'imagen'];
}
