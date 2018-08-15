<?php

namespace Uatfinfra\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Uatfinfra\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Uatfinfra\Http\Requests\SaveRolesRequest;
use Alert;
use Toastr;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Role);

        return view('automotives.admin.users.roles.index', [ 
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $role = new Role);

        return view('automotives.admin.users.roles.create', [
            'role' => $role,
            'permissions' => Permission::pluck('name','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolesRequest $request)
    {
        $this->authorize('create', new Role);

        $role = Role::create($request->validate());

        if($request->has('permissions'))
        {
            $role->givePermissionTo($request->permissions);
        }

        Alert::success('Rol creado correctamente...!!!');

        Toastr::success('El ROL fue creado correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);

        return redirect('roless');

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
        $role = Role::find($id);
        //dd($role);
        $this->authorize('update', $role);

        return view('automotives.admin.users.roles.edit', [
            'role' => $role,
            'permissions' => Permission::pluck('name','id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRolesRequest $request, $id)
    {
        $role = Role::find($id);
        //return $role;
        $this->authorize('update', $role);

        $role->update($request->validated());

        $role->permissions()->detach();

        if($request->has('permissions'))
        {
            $role->givePermissionTo($request->permissions);
        }

        Alert::success('Rol editado correctamente...!!!');

        Toastr::success('El ROL fue editado correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);

        return redirect('roless');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        
        $this->authorize('delete', $role);

        $role->delete();

        Alert::success('Rol fue eliminado!!!');

        Toastr::success('El ROL fue eliminado correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);

        return redirect('roless');

    }
}
