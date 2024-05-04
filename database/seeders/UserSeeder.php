<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear los roles
        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleEmpleado = Role::create(['name' => 'Empleado']);
        $roleCliente = Role::create(['name' => 'Cliente']);

        //Permisos
        Permission::create(['name'=>'ver:role'])->assignRole($roleAdmin);
        Permission::create(['name'=>'crear:role'])->assignRole($roleAdmin);
        Permission::create(['name'=>'editar:role'])->assignRole($roleAdmin);
        Permission::create(['name'=>'borrar:role'])->assignRole($roleAdmin);

        Permission::create(['name'=>'ver:permiso'])->assignRole($roleAdmin);

        Permission::create(['name'=>'ver:usuario'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name'=>'crear:usuario'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name'=>'editar:usuario'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name'=>'borrar:usuario'])->syncRoles([$roleAdmin, $roleEmpleado]);

        Permission::create(['name'=>'ver:Autos'])->syncRoles([$roleAdmin, $roleEmpleado, $roleCliente]);
        Permission::create(['name'=>'crear:Autos'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name'=>'editar:Autos'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name'=>'borrar:Autos'])->syncRoles([$roleAdmin, $roleEmpleado]);

        Permission::create(['name'=>'ver:Cotizacion'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name'=>'crear:Cotizacion'])->syncRoles([$roleAdmin, $roleEmpleado, $roleCliente]);
        Permission::create(['name'=>'editar:Cotizacion'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name'=>'borrar:Cotizacion'])->syncRoles([$roleAdmin, $roleEmpleado]);

        Permission::create(['name'=>'ver:Financiacion'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name'=>'crear:Financiacion'])->syncRoles([$roleAdmin, $roleEmpleado, $roleCliente]);
        Permission::create(['name'=>'editar:Financiacion'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name'=>'borrar:Financiacion'])->syncRoles([$roleAdmin, $roleEmpleado]);

        Permission::create(['name'=>'ver:Posventa'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name'=>'crear:Posventa'])->syncRoles([$roleAdmin, $roleEmpleado, $roleCliente]);
        Permission::create(['name'=>'editar:Posventa'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name'=>'borrar:Posventa'])->syncRoles([$roleAdmin, $roleEmpleado]);

        Permission::create(['name'=>'ver:testdrive'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name'=>'crear:testdrive'])->syncRoles([$roleAdmin, $roleEmpleado, $roleCliente]);
        Permission::create(['name'=>'editar:testdrive'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name'=>'borrar:testdrive'])->syncRoles([$roleAdmin, $roleEmpleado]);

        Permission::create(['name'=>'ver:pqrs'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name'=>'crear:pqrs'])->syncRoles([$roleAdmin, $roleEmpleado, $roleCliente]);
        Permission::create(['name'=>'editar:pqrs'])->syncRoles([$roleAdmin, $roleEmpleado]);
        Permission::create(['name'=>'borrar:pqrs'])->syncRoles([$roleAdmin, $roleEmpleado]);
        
        //Crea usuario con rol de administrador
        $user = new User;
        $user->name = 'admin';
        $user->last_name = 'admin';
        $user->cellphone = 1234567;
        $user->email = 'admin@example.com';
        $user->password = bcrypt('1234567890');
        $user->save();
        $user->assignRole($roleAdmin);
    }
}
