<?php

namespace App\Http\Controllers;

use App\Role;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class AdminRolesController extends Controller
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


    public function index()
    {
        //
        $roles = Role::paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|max:20|unique:roles',           
        ]);


        $role = Role::all();
        $id = ($role->last()->id) + 1;

        $role = new Role();
        $role->id = $id;
        $role->nombre = $request->input('nombre');
        $role->save();
        Session::flash('role_creado','El role ha sido creado con éxito');
        return redirect('/roles');
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
        $role=Role::findOrFail($id);
        return view("admin.roles.edit", compact("role"));
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
            'nombre' => 'required|max:20|unique:roles,nombre,'.$id,           
        ]);

        $role=Role::findOrFail($id);

        $entrada=$request->all();

        $role->update($entrada);
        Session::flash('role_actualizado','El Role ha sido actualizado con éxito');
        return redirect('/roles');
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
        $role=Role::findOrFail($id)->delete();
        Session::flash('role_eliminado','El role ha sido eliminado con éxito');
        return redirect('/roles');
    }
}
