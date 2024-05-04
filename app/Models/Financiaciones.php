<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financiaciones extends Model
{
    use HasFactory;
    //LO MISMO QUE EN LOS DEMAS MODELOS
    protected $primaryKey = 'id';
    protected $table='financiaciones';

    public function user(){
        return $this->belongsTo(Clientes::class,'user_id');
    }

    public function auto(){
        return $this->belongsTo(Autos::class,'cod_auto');
    }
}
