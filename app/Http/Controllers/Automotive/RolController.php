<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\User;
use Uatfinfra\ModelAutomotores\Viaje;
use Uatfinfra\ModelAutomotores\Informe;
use Session;
use Auth;

class RolController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
        $choferes = User::where('type','Conductor')->where('position','AUTOMOTORES')->get();

        $viajes = Viaje::where('estado','activo')->get();

        $informes = Informe::where('estado','APROBADO')->get();

    	return view('automotives.automotive.rol.index',compact('choferes','viajes','informes'));
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
    public function store(Request $request)
    {
        //
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
        //
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
