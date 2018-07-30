<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\User;
use Uatfinfra\ModelAutomotores\Viaje;
use Uatfinfra\ModelAutomotores\Informe;
use Uatfinfra\ModelAutomotores\PermiViaje;
use Uatfinfra\ModelAutomotores\Tipo;
use Uatfinfra\Http\Requests\PermiSaveRequest;
use Session;
use Auth;
use Alert;
use Toastr;

class RolController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
        $choferes = User::where('type','Conductor')->where('position','AUTOMOTORES')->orderBy('grade','ASC')->get();

        $viajes = Viaje::where('estado','activo')->get();
        $totalvi = Viaje::where('estado','activo')->count();

        $informes = Informe::where('estado','APROBADO')->get();

    	return view('automotives.automotive.rol.index',compact('choferes','viajes','informes','totalvi'));
    }	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermiSaveRequest $request)
    {
        PermiViaje::create($request->all());
        
        //Session::flash('message','El permiso se inserto correctamente...');
        Alert::success('El permiso se inserto correctamente...!!!');

        Toastr::success('El permiso se inserto correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
        return redirect('roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$viaje = Viaje::where('tipo','frontera')->count();
        //return $viaje;
        $choferes = User::where('type','Conductor')->where('position','AUTOMOTORES')->get();
        return view('automotives.automotive.rol.edit',compact('choferes','viaje'));*/

        $user = User::where('id',$id)->first();
        //dd($user);

        $viajes = \DB::table('viajes')
            ->join('user_viaje', 'viajes.id', '=', 'user_viaje.viaje_id')
            ->join('rutas', 'viajes.id', '=', 'rutas.viaje_id')
            ->select('viajes.*','rutas.*')
            ->where('user_viaje.user_id',$id)
            ->where('viajes.estado','activo')
            ->get();

         
        return view('automotives.automotive.rol.create',compact('user','viajes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permiviaje = PermiViaje::where('id',$id)->first();
        $tipos = Tipo::get();
        return view('automotives.automotive.rol.edit',compact('permiviaje','tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermiSaveRequest $request, $id)
    {
        $permi = PermiViaje::find($id);
        $permi->update($request->all());
        $permi->save();  
        
       // Session::flash('message','El permiso fue EDITADO correctamente...');
        Alert::info('El permiso fue EDITADO correctamente...!!!');

        Toastr::success('El permiso fue EDITADO correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
        return redirect('roles');
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
    }
}
