<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index(){
        $roles=Role::with('permissions')->get();
        return view('components.Admin.roles',['roles'=>$roles]);
    }
    public function store(Request $request){
        
    }
    public function update(Request $request, Role $rol){
        
    }
    public function destroy($id){
        
    }
}
