<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
{
    public function index(){
        $permisos = Permission::paginate(10);
        return view('components.Admin.permisos',['permisos'=>$permisos]);
    }
}
