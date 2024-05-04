<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posventas extends Model
{
    use HasFactory;
    //LO MISMO QUE EN LOS DEMAS MODELOS
    protected $primaryKey = 'id';
    protected $table='posventas';
    public function user()
    {
        return $this->belongsTo(Clientes::class,'user_id');
    }
}
