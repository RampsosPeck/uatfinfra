<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\User;
use Uatfinfra\ModelAutomotores\Viaje;
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
        /*
        $user = \DB::table('users')
            ->join('user_viaje', 'users.id', '=', 'user_viaje.user_id')
            ->join('viajes', 'user_viaje.viaje_id', '=', 'viajes.id')
            ->select('users.*', 'viajes.*')
            ->where('viajes.categoria','provincia')
            ->orderBy('users.name')
            ->count();
        return $user;*/

        $viaje = Viaje::where('categoria','provincia')->count();
        //return $viaje;
        $choferes = User::where('type','Conductor')->where('position','AUTOMOTORES')->get();

    	return view('automotives.automotive.rol.index',compact('choferes','viaje'));
    }	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $viaje = Viaje::where('categoria','ciudad')->count();
        //return $viaje;
        $choferes = User::where('type','Conductor')->where('position','AUTOMOTORES')->get();

        return view('automotives.automotive.rol.create',compact('choferes','viaje'));

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
        $viaje = Viaje::where('categoria','frontera')->count();
        //return $viaje;
        $choferes = User::where('type','Conductor')->where('position','AUTOMOTORES')->get();

        return view('automotives.automotive.rol.edit',compact('choferes','viaje'));
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
