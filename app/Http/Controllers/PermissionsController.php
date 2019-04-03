<?php

namespace Uatfinfra\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Alert;
use Toastr;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Permission);

        return view('automotives.admin.users.permissions.index', [ 
            'permissions' => Permission::all()
        ]);
    } 
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission);


        return view('automotives.admin.users.permissions.edit', [ 
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->authorize('update', $permission);

        $data = $request->validate(['display_name' => 'required']);

        $permission->update($data);

        Alert::success('Permiso editado correctamente...!!!');

        Toastr::success('El PERMISO fue editado correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);

        return redirect('permissions');

    }
 
}
