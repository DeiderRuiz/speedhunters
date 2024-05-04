<?php

namespace App\Http\Controllers;

use App\Models\Autos;
use Illuminate\Http\Request;


class AutosController extends Controller
{
    /* Vista principal */
    public function welcome(){
        $autos=Autos::paginate(10);
        return view('welcome', ['autos'=>$autos]);
    }
    /* Para vista de autos tanto de invitados como usuarios con rol */
    public function index(){
        $autos=Autos::paginate(10);
        return view('autos.index', ['autos'=>$autos]);
    }
    /* Muestra las caracteristicasde un auto */
    public function show(Autos $autos){
        return view('autos.show',['autos'=>$autos]);
    }
    /* Vista para crear un nuevo auto */
    public function create(){
        return view('autos.create', ['auto' => new Autos]);
    }
    /* Para validar el nuevo auto */
    public function store(Request $request){
        /* Reglas de validación */
        $request->validate([
            'marca'=>'required|min:3|max:20',
            'modelo'=>'required|min:1|max:30',
            'precio'=>'required|numeric|digits_between:7,10',
            'years'=>'required|numeric|digits:4',
            'clase'=>'required|min:3|max:20',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ficha_tecnica' => 'required|file|mimes:pdf|max:2048',
        ]);
        /* Guarda imagen en carpeta Pulic */
        $path=$request->file('imagen')->store('public/files');
        $array=explode('public',$path);
        /* GUarda PDF de ficah tecnica en public */
        $pdf=$request->file('ficha_tecnica')->store('public/files');
        $array_ficha=explode('public',$pdf);
        /* Crear el nuevo auto */
        $auto = new Autos();
        $auto->marca = $request->input('marca');
        $auto->modelo = $request->input('modelo');
        $auto->precio = $request->input('precio');
        $auto->years = $request->input('years');
        $auto->clase = $request->input('clase');
        $auto->imagen='storage'.$array[1];
        $auto->ficha_tecnica='storage'.$array_ficha[1];
        /* Guarda el nuevo auto en la tabla autos de la base de datos */
        $auto->save();

        return redirect()->route('autos.create')->with('success', 'El auto se ha guardado correctamente.');
    }


    public function edit(Autos $auto){
        return view('autos.edit',['auto'=>$auto]);
    }

    public function update(Request $request, Autos $auto){
        $request->validate([
            'marca'=>'required|min:3|max:20',
            'modelo'=>'required|min:1|max:30',
            'precio'=>'required|numeric|digits_between:7,10',
            'years'=>'required|numeric|digits:4',
            'clase'=>'required|min:3|max:20',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ficha_tecnica' => 'required|file|mimes:pdf|max:2048',
        ]);

        $path=$request->file('imagen')->store('public/files');
        $array=explode('public',$path);
        $pdf=$request->file('ficha_tecnica')->store('public/files');
        $array_ficha=explode('public',$pdf);

        $auto->marca = $request->input('marca');
        $auto->modelo = $request->input('modelo');
        $auto->precio = $request->input('precio');
        $auto->years = $request->input('years');
        $auto->clase = $request->input('clase');
        $auto->imagen='storage'.$array[1];
        $auto->ficha_tecnica='storage'.$array_ficha[1];
        $auto->save();
        return redirect()->route('autos.index')->with('success', 'El auto se ha guardado correctamente.');
    }
    /* Función para borrar un auto (NO TIENE PROPOSITO EN ESTA APP, SOLO FUE PARA RECORDAR COMO SE ESCRIBE LA FUNCIÓN :p) */
    public function destroy(Autos $Autos){
        $Autos->delete();
        return to_route('autos.index')->with('success', 'Auto Borrado');
    }
}
