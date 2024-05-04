<?php

namespace App\Http\Controllers;

use App\Models\Autos;
use App\Models\Clientes;
use App\Models\Testdrive;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TestdriveController extends Controller
{
    /* LAS FUNCIONES HACEN LO MISMO QUE COTIZACIÓN PERO PARA UN TEST DRIVE */
    public function index(){
        $testdives=Testdrive::with(['user', 'auto'])->orderByRaw(
            "CASE WHEN estado = 'solicitado' THEN '1'
            WHEN estado = 'aprobado' THEN '2'
            WHEN estado = 'rechazado' THEN '3'
            ELSE '4'
            END"
            )->orderBy('fecha', 'desc')->paginate(10);
        return view('testdrive.index', ['testdrives'=>$testdives]);
    }

    public function show(Testdrive $testdrive){
        return view('testdrive.show',['testdrive'=>$testdrive]);
    }

    public function pdf(Request $request){
        $id = $request->input('id');
        $testdrive=Testdrive::find($id);
        $pdf = Pdf::loadView('testdrive.pdf', compact('testdrive'));
        return $pdf->stream();
    }

    public function create(){
        $autos=Autos::get();
        $cantidadAutos = Autos::count();
        return view('testdrive.create',['testdrive'=> new Testdrive], ['autos'=>$autos,'cantidad'=>$cantidadAutos]);
    }
    
    public function store(Request $request){
        $request->validate([
            'cc'=>'required|numeric|digits_between:9,11',
            'name'=>'required|min:3|max:30',
            'last_name'=>'required|min:3|max:30',
            'cellphone'=>'required|numeric|digits:10',
            'email'=>'required|email',
            'fecha'=>'required|date|after_or_equal:3 days|before_or_equal:1 month',
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

        $testdrive = new Testdrive();
        $testdrive->fecha = $request->input('fecha');
        $testdrive->user_id = $user->id;
        $testdrive->cod_auto = $auto->id;
        $testdrive->save();

        // Generar el PDF
        $user = $testdrive->user; // obtiene el cliente asociado con la cotización
        $auto = $testdrive->auto; // obtiene el auto asociado con la cotización

        /* return $pdf->stream(); */
        return redirect()->route('testdrive.show', ['testdrive' => $testdrive->id])->with([
            'success' => 'La Solicitud De Test Drive Se Ha Enviado Correctamente',
            'testdrive' => $testdrive->id,
        ]);

    }

    public function edit(Testdrive $testdrive){
        return view('testdrive.edit',['testdrive'=>$testdrive]);
    }

    public function update(Request $request, Testdrive $testdrive){
        $request->validate([
            'estado'=>'required'
        ]);
        $testdrive->estado = $request->input('estado');
        $testdrive->save();

        return redirect()->route('testdrive.index')->with('success', 'La Solicitud De Test Drive Ha Sido Actualizada Correctamente');
    }
}
