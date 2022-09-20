<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.edit')->only('edit', 'update');
        $this->middleware('can:users.create')->only('create', 'store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Users.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view("Users.create", [
            "roles" => $roles,
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
                'nombre' => ['required', 'string', 'max:255'],
                'usuario' => ['required', 'string', 'max:255', 'unique:users,username'],
                'clave' => ['required', 'string', 'confirmed'],
                'roles' => ['array'],
            ]);

            $user = new User();
            $user->name = $request->nombre;
            $user->username = $request->usuario;
            $user->email = "prueba@test.com";
            $user->password = Hash::make($request->clave);
            $user->save();

            $user->roles()->sync($request->roles);

            $log = new Log();
            $log->accion = "Crear usuario ".$user->id;
            $log->user_id = Auth::user()->id;
            $log->save();

            DB::commit();

            return view("Users.index");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
        return $request;
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
    public function edit(User $usuario)
    {
        $roles = Role::all();
        return view("Users.edit", [
            'usuario' => $usuario,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'nombre' => 'required',
            ]);
            
            $usuario->name = $request->nombre;
            $usuario->save();
            $usuario->roles()->sync($request->roles);

            $log = new Log();
            $log->accion = "Editar usuario ".$usuario->id;
            $log->user_id = Auth::user()->id;
            $log->save();

            DB::commit();
        
            return redirect()->route('usuarios.index');
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
    public function destroy($usuario)
    {
        try {
            DB::beginTransaction();

            $user = User::find($usuario);
            $user->delete();

            $log = new Log();
            $log->accion = "Eliminar al usuario ".$user->id;
            $log->user_id = Auth::user()->id;
            $log->save();

            DB::commit();

            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            return throw $th;
        }
    }
}
