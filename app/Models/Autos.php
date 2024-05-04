<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autos extends Model
{
    use HasFactory;
    /* Para que laravel encuentre la tabla y su llave primaria */
    protected $primaryKey = 'id';
    protected $table='autos';
}
