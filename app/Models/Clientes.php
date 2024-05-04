<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//ESTE MODELO ES SOLO PARA LOS USUARIOS NO LOGEADOS (INVITADS O CLIENTES)
class Clientes extends Model
{
    use HasFactory;
    //LO MISMO QUE EN EL MODELO AUTOS
    protected $primaryKey = 'id';
    protected $table='clientes';
}
