<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pqrs extends Model
{
    use HasFactory;
    //LO MISMO QUE EN LOS DEMAS MODELOS
    protected $primaryKey = 'id';
    protected $table='pqrs';
    public function clientes()
    {
        return $this->hasMany(Pqrs::class);
    }
    public function cliente()
    {
        return $this->belongsTo(Clientes::class,'user_id');
    }
}
