<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware("can:roles.index")->only('index');
        $this->middleware("can:roles.create")->only('create', 'store');
        $this->middleware("can:roles.edit")->only('edit', 'update');
        $this->middleware("can:roles.destroy")->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Roles.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view("Roles.create", [
            "permissions" => $permissions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'nombre' => 'required',
                'permisos' => 'array',
            ]);
    
            $rol = new Role();
            $rol->name = $request->nombre;
            $rol->guard_name = 'web';
            $rol->save();
    
            $rol->permissions()->sync($request->permisos);

            $log = new Log();
            $log->accion = "Crear nuevo rol ".$rol->id;
            $log->user_id = Auth::user()->id;
            $log->save();

            DB::commit();

            return redirect()->route("roles.index");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view("Roles.edit", [
            'rol' => $role,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'nombre'  => 'required',
                'permisos' => 'array',
            ]);

            $role->name = $request->nombre;
            $role->save();

            $role->permissions()->sync($request->permisos);

            $log = New Log();
            $log->accion = "Editar rol ".$role->id;
            $log->user_id = Auth::user()->id;
            $log->save();

            DB::commit();

            return redirect()->route("roles.index");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        try {
            DB::beginTransaction();

            $role->delete();

            $log = new Log();
            $log->accion = "Eliminar rol ".$role->id;
            $log->user_id = Auth::user()->id;
            $log->save();

            DB::commit();

            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }
}
