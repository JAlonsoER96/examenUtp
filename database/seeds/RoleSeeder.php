<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name'=>'admin']);
        $superVisorVentas = Role::create(["name"=>"Supervisor Ventas"]);
        $ventas = Role::create(["name"=>"Ventas"]);
        $superVisorCompras = Role::create(["name"=>"Supervisor Compras"]);
        $compras = Role::create(["name"=>"Compras"]);
        $generico = Role::create(['name'=>"Visitas"]);

        Permission::create(['name'=>'admin'])->syncRoles([$admin]);
        Permission::create(['name'=>'reporte ventas'])->syncRoles([$admin]);
        Permission::create(['name'=>'ventas'])->syncRoles([$admin]);
        Permission::create(['name'=>'reporte compras'])->syncRoles([$admin]);
        Permission::create(['name'=>'compras'])->syncRoles([$admin]);
    }
}
