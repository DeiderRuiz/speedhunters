<?php

namespace App\Http\Controllers;

use App\Models\Autos;
use App\Models\Cotizaciones;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CotizacionesController extends Controller
{
    /* Muestra todas las solicitudes de ctización según el campo estado en la tabla cotizciones */
    public function index(){
        $cotizaciones=Cotizaciones::with(['user', 'auto'])->orderByRaw(
            "CASE WHEN estado = 'solicitado' THEN '1'
            WHEN estado = 'aprobado' THEN '2'
            WHEN estado = 'rechazado' THEN '3'
            ELSE '4'
            END"
            )->orderBy('fecha', 'desc')->paginate(10);
        return view('cotizaciones.index', ['cotizaciones'=>$cotizaciones]);
    }
    /* Muestra los detalles de la cotización */
    public function show(Cotizaciones $cotizacion){
        return view('cotizaciones.show',['cotizacion'=>$cotizacion]);
    }
    /* Hace una vista en formato PDF */
    public function pdf(Request $request){
        $id = $request->input('id');
        $cotizacion = Cotizaciones::find($id);
        $pdf = Pdf::loadView('cotizaciones.pdf', compact('cotizacion'));
        return $pdf->stream();
    }
    /* Obtiene autos disponibles y muestra la vista para solicitar una cotización */
    public function create(){
        $autos=Autos::get();
        $cantidadAutos = Autos::count();
        return view('cotizaciones.create',['cotizacion'=> new Cotizaciones], ['autos'=>$autos,'cantidad'=>$cantidadAutos]);
    }
    /* Crea y guarda la nueva solicitud en latabla correspondiente */
    public function store(Request $request){
        /* Reglas de validación */
        $request->validate([
            'cc'=>'required|numeric|digits_between:9,11',
            'name'=>'required|min:3|max:30',
            'last_name'=>'required|min:3|max:30',
            'cellphone'=>'required|numeric|digits:10',
            'email'=>'required|email',
            'fecha'=>'required|date|after_or_equal:3 days|before_or_equal:1 month',
            'cod_auto'=>'required',
        ]);
        /* Busca el auto slicitado mediante su id */
        $auto = Autos::findOrFail($request->input('cod_auto'));
        /* Guarda un nuevo cliente */
        $user = new Clientes();
        $user->cc = $request->input('cc');
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->cellphone = $request->input('cellphone');
        $user->email = $request->input('email');
        $user->save();
        /* Crea una nueva solicitud de cotización */
        $cotizacion = new Cotizaciones();
        $cotizacion->fecha = $request->input('fecha');
        /* Asocia el auto y el cliente a esta solicitud */
        $cotizacion->user_id = $user->id;
        $cotizacion->cod_auto = $auto->id;
        /* Guarda la información en las tablas correspondientes */
        $cotizacion->save();

        // Generar el PDF
        $user = $cotizacion->user; // obtiene el cliente asociado con la cotización
        $auto = $cotizacion->auto; // obtiene el auto asociado con la cotización

        /* return $pdf->stream(); */
        return redirect()->route('cotizacion.show', ['cotizacion' => $cotizacion->id])->with([
            'success' => 'La Solicitud De Cotización Se Ha Enviado Correctamente'
        ]);
    }
    /* Vista para cambiar el estado de la cotización */
    public function edit(Cotizaciones $cotizacion){
        return view('cotizaciones.edit',['cotizacion'=>$cotizacion]);
    }
    /* FUncion donde se cambia el estado de una cotización */
    public function update(Request $request, Cotizaciones $cotizacion){
        $request->validate([
            'estado'=>'required'
        ]);
        $cotizacion->estado = $request->input('estado');
        $cotizacion->save();

        return redirect()->route('cotizacion.index')->with('success', 'La Solicitud De Cotización Ha Sido Actualizada Correctamente');
    }
}
