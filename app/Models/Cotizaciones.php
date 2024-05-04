<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizaciones extends Model
{
    use HasFactory;
    //LO MISMO QUE EN LOS DEMAS MODELOS
    protected $primaryKey = 'id';
    protected $table='cotizaciones';
    //Establece una relación Muchos a uno (También para las uno a uno) con el modelo Clientes
    public function user(){
        return $this->belongsTo(Clientes::class, 'user_id');
    }
    //Establece la misma relación que la función anterior pero con el modelo Autos
    public function auto(){
        return $this->belongsTo(Autos::class, 'cod_auto');
    }
}