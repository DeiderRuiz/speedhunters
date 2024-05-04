<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Pqrs;
use Illuminate\Http\Request;

class PqrsController extends Controller
{
    /* FUNCIONES PARECIDAS A POSVENTA PERO PARA UN PQRS */
    public function index(){
        $pqrs=Pqrs::paginate(10);
        return view('pqrs.index', ['pqrs'=>$pqrs]);
    }

    public function create(){
        return view('pqrs.create',['pqrs'=> new Pqrs]);
    }
    public function store(Request $request){
        $request->validate([
            'cc'=>'required|numeric|digits_between:9,11',
            'name'=>'required|min:3|max:30',
            'last_name'=>'required|min:3|max:30',
            'cellphone'=>'required|numeric|digits:10',
            'email'=>'required|email',
            'tipo'=>'required|min:3|max:15',
            'descripcion'=>'required|min:3|max:250',
        ]);

        $user = new Clientes();
        $user->cc = $request->input('cc');
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->cellphone = $request->input('cellphone');
        $user->email = $request->input('email');
        $user->save();

        $pqrs = new Pqrs();
        $pqrs->tipo = $request->tipo;
        $pqrs->descripcion = $request->descripcion;
        $pqrs->user_id = $user->id;
        $pqrs->save();

        return redirect()->route('pqrs.create')->with('success', 'El mensaje ha sido enviado');
    }


    public function edit(Pqrs $pqrs){
        return view('pqrs.edit',['pqrs'=>$pqrs]);
    }

    public function update(Request $request, Pqrs $pqrs){
        $request->validate([
            'estado'=>'required'
        ]);
        $pqrs->estado = $request->input('estado');
        $pqrs->save();

        return redirect()->route('pqrs.index')->with('success', 'El mensaje ha sido actualizado');
    }
}
