<?php

namespace App\Http\Controllers;

use App\User;

use App\Role;

use App\Firma;

use Illuminate\Http\Request;

use App\Http\Requests\createUsersRequest;

use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
        $this->Middleware('EsAdmin');
    }


    public function index(Request $request)
    {
        //
        $name = $request->get('name');
        $email = $request->get('email');
        $role_id = $request->get('role_id');
        $firma_id = $request->get('firma_id');

        $roles = Role::all();
        $firmas = Firma::all();

        $usuarios = User::orderBy('id', 'ASC')
        ->name($name)
        ->email($email)
        ->role_id($role_id)
        ->firma_id($firma_id)
        ->paginate(10);
        return view('admin.users.index', compact('usuarios', 'roles', 'firmas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createUsersRequest $request)
    {

        //       
        $user = User::all();
        $id = ($user->last()->id) + 1;
        //encriptar contraseña
        $password = bcrypt($request->input('password'));

        $user = new User();
        $user->id = $id;
        $user->name = $request->input('name');
        $user->telefono = $request->input('telefono');
        $user->email = $request->input('email');
        $user->password = $password;
        $user->save();

        Session::flash('usuario_creado','El usuario ha sido creado con éxito');
        return redirect('/users');
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
    public function edit($id)
    {
        //
        $usuario=User::findOrFail($id);
        $roles = Role::all();
        $firmas = Firma::all();
        return view("admin.users.edit", compact("usuario", "roles", "firmas"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'name' => 'required|string|max:50',
        ]);

        $user=User::findOrFail($id);
        $user->update($request->all());
        Session::flash('usuario_actualizado','El usuario ha sido actualizado con éxito');
        return redirect("/users");

        //Return ($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user=User::findOrFail($id)->delete();
        Session::flash('usuario_borrado','El usuario ha sido eliminado con éxito');
        return redirect('/users');
    }
}
