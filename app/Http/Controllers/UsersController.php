<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Rap2hpoutre\FastExcel\FastExcel;

class UsersController extends Controller
{
    public function vistaClientes()
    {
        $roles = Role::all();
        $permisos = Permission::all();
        $empresas = Empresa::orderBy('nombre','ASC')->get();
        return view('index',compact('roles','permisos','empresas'));
    }
    public function all()
    {
        $usuarios = User::withTrashed()->with(['empresa','roles','permissions'])->get();

        return response()->json(["usuarios" => $usuarios]);
    }
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name"=>'required',
            'birthday'=>'required',
            'email'=>'required|email|unique:users',
            'phone'=>'required',
            'cellphone'=>'required',
            'password' => 'required',
            'genere' => 'required',
            'empresa_id' =>'required',
            'rol'=>'required',
            'permisos' => 'required|array|min:1'
        ]);
        if ($validator->fails()) {
            return response()->json(["errors"=>$validator->errors()->all(),"usuario"=>[]]);
        }

        $usuario = new User;
        $usuario->name = $request->name;
        $usuario->birthday = $request->birthday;
        $usuario->email = $request->email;
        $usuario->cellphone = $request->cellphone;
        $usuario->phone = $request->phone;
        $usuario->password = bcrypt($request->password);
        $usuario->genere = $request->genere;
        $usuario->empresa_id = $request->empresa_id;
        $usuario->save();

        $usuario->assignRole($request->rol);
        foreach ($request->permisos as $permiso) {
            $usuario->givePermissionTo($permiso);
        }

        return response()->json(["errors"=>[],"usuario"=>[$usuario]]);
    }
    public function show($id)
    {
        $roles = Role::all();
        $empresas = Empresa::orderBy('nombre','ASC')->get();
        $usuario = User::where('id',$id)->with(['roles','permissions'])->first();
        $permisosActuales = collect();
        foreach ($usuario->permissions as $permiso) {
            $permisosActuales->push($permiso->id);
        }
        $permisos = Permission::whereNotIn('id',$permisosActuales)->get();
        return view('usuarios.show',compact('usuario','permisos','roles','empresas'));
    }
    public function edit(Request $request, $id)
    {

        $permisosActivos = $request->permisosActivos;
        $permisosNoActivos = $request->permisosNoActivos;
        $usuario = User::where('id',$id)->with(['roles','permissions'])->first();
        $validator = Validator::make($request->all(), [
            "name"=>'required',
            'birthday'=>'required',
            'email'=>'required|email|unique:users,id',
            'phone'=>'required',
            'cellphone'=>'required',
            'genere' => 'required',
            'empresa_id' =>'required',
            'rol'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json(["errors"=>$validator->errors()->all(),"usuario"=>[]]);
        }
        $usuario->name = $request->name;
        $usuario->birthday = $request->birthday;
        $usuario->email = $request->email;
        $usuario->cellphone = $request->cellphone;
        $usuario->phone = $request->phone;
        if(isset($request->password)){
            $usuario->password = bcrypt($request->password);
        }
        $usuario->genere = $request->genere;
        $usuario->empresa_id = $request->empresa_id;
        $roles = $usuario->getRoleNames();

        $usuario->save();
        if ($roles[0] != $request->rol) {
            $usuario->removeRole($roles[0]);
            $usuario->assignRole($request->rol);
        }
        $usuario->syncPermissions($permisosActivos);

        return response()->json(["errors"=>[],"usuario"=>[$usuario]]);
    }
    public function bloqueo(Request $request)
    {
        $usuario = User::find($request->id)->delete();

        return response()->json($usuario);
    }

    public function restore(Request $request)
    {
        $usuario = User::withTrashed()->find($request->id)->restore();

        return response()->json($usuario);
    }

    public function exportExcel(Request $request){
       $usuarios = User::where('empresa_id',$request->empresa)->with(['roles'])->get();
       return (new FastExcel($usuarios))->download('Usuarios' . date('Y-m-d H:i:s') . '.xlsx');

    }


}
