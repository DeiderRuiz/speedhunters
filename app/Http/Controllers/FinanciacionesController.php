<?php

namespace App\Http\Controllers;

use App\Models\Autos;
use App\Models\Clientes;
use App\Models\Financiaciones;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FinanciacionesController extends Controller
{
    /* TODO FUNCIONA IGUAL QUE EN COTIZACIÓN PERO CON EL CAMPO DE CUOTAS */
    public function index(){
        $financiaciones=Financiaciones::with(['user', 'auto'])->orderByRaw(
            "CASE WHEN estado = 'solicitado' THEN '1'
            WHEN estado = 'aprobado' THEN '2'
            WHEN estado = 'rechazado' THEN '3'
            ELSE '4'
            END"
            )->orderBy('fecha', 'desc')->paginate(10);
        return view('financiaciones.index', ['financiaciones'=>$financiaciones]);
    }
    
    public function show(Financiaciones $financiacion){
        return view('financiaciones.show',['financiacion'=>$financiacion]);
    }

    public function pdf(Request $request){
        $id = $request->input('id');
        $financiacion = Financiaciones::find($id);
        $pdf = Pdf::loadView('financiaciones.pdf', compact('financiacion'));
        return $pdf->stream();
    }

    public function create(){
        $autos=Autos::get();
        $cantidadAutos = Autos::count();
        return view('financiaciones.create',['financiacion'=> new Financiaciones], ['autos'=>$autos,'cantidad'=>$cantidadAutos]);
    }
    
    public function store(Request $request){
        $request->validate([
            'cc'=>'required|numeric|digits_between:9,11',
            'name'=>'required|min:3|max:30',
            'last_name'=>'required|min:3|max:30',
            'cellphone'=>'required|numeric|digits:10',
            'email'=>'required|email',
            'fecha'=>'required|date|after_or_equal:3 days|before_or_equal:1 month',
            'cuotas'=>'required|numeric|digits:2',
            'cod_auto'=>'required',
        ]);

        $auto = Autos::findOrFail($request->input('cod_auto'));

        $user = new Clientes();
        $user->cc = $request->input('cc');
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->cellphone = $request->input('cellphone');
        $user->email = $request->input('email');
        $user->save();

        $financiacion = new Financiaciones();
        $financiacion->fecha = $request->input('fecha');
        $financiacion->cuotas = $request->cuotas;
        $financiacion->user_id = $user->id;
        $financiacion->cod_auto = $auto->id;
        $financiacion->save();

        // Generar el PDF
        $user = $financiacion->user; // obtiene el cliente asociado con la cotización
        $auto = $financiacion->auto; // obtiene el auto asociado con la cotización

        /* return $pdf->stream(); */
        return redirect()->route('financiacion.show', ['financiacion' => $financiacion->id])->with([
            'success' => 'La Solicitud De Financiación Se Ha Enviado Correctamente',
            'financiacion' => $financiacion->id,
        ]);
    }

    public function edit(Financiaciones $financiacion){
        return view('financiaciones.edit',['financiacion'=>$financiacion]);
    }

    public function update(Request $request, Financiaciones $financiacion){
        $request->validate([
            'estado'=>'required'
        ]);
        $financiacion->estado = $request->input('estado');
        $financiacion->save();

        return redirect()->route('financiacion.index')->with('success', 'La Solicitud De Financiación Ha Sido Actualizada Correctamente');
    }
}
