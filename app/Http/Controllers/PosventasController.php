<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Posventas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PosventasController extends Controller
{
    /* LO MISMO QUE COTIZACIÓN PERO SIN RELACIONAR SECON LA TABLA DE AUTOS */
    public function index(){
        $posventas=Posventas::with(['user'])->orderByRaw(
            "CASE WHEN estado = 'solicitado' THEN '1'
            WHEN estado = 'aprobado' THEN '2'
            WHEN estado = 'rechazado' THEN '3'
            ELSE '4'
            END"
            )->orderBy('fecha', 'desc')->paginate(10);
        return view('posventa.index', ['posventas'=>$posventas]);
    }
    public function show(Posventas $posventa){
        return view('posventa.show',['posventa'=>$posventa]);
    }

    public function pdf(Request $request){
        $id = $request->input('id');
        $posventa=Posventas::find($id);
        $pdf = Pdf::loadView('posventa.pdf', compact('posventa'));
        return $pdf->stream();
    }

    public function create(){
        return view('posventa.create',['posventa'=> new Posventas]);
    }
    
    public function store(Request $request){
        $request->validate([
            'cc'=>'required|numeric|digits_between:9,11',
            'name'=>'required|min:3|max:30',
            'last_name'=>'required|min:3|max:30',
            'cellphone'=>'required|numeric|digits:10',
            'email'=>'required|email',
            'fecha'=>'required|date|after_or_equal:3 days|before_or_equal:1 month',
        ]);

        $user = new Clientes();
        $user->cc = $request->input('cc');
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->cellphone = $request->input('cellphone');
        $user->email = $request->input('email');
        $user->save();

        $posventa = new Posventas();
        $posventa->fecha = $request->input('fecha');
        $posventa->user_id = $user->id;
        $posventa->save();

        // Generar el PDF
        $user = $posventa->user; // obtiene el cliente asociado con la cotización

        /* return $pdf->stream(); */
        return redirect()->route('posventa.show', ['posventa' => $posventa->id])->with([
            'success' => 'La Solicitud De Posventa Se Ha Enviado Correctamente',
            'posventa' => $posventa->id,
        ]);
    }

    public function edit(Posventas $posventa){
        return view('posventa.edit',['posventa'=>$posventa]);
    }

    public function update(Request $request, Posventas $posventa){
        $request->validate([
            'estado'=>'required'
        ]);
        $posventa->estado = $request->input('estado');
        $posventa->save();

        return redirect()->route('posventa.index')->with('success', 'La Solicitud De Posventa Ha Sido Actualizada Correctamente');
    }
}
