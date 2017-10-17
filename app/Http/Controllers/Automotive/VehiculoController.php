<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Uatfinfra\ModelAutomotores\Vehiculo;
use Uatfinfra\ModelAutomotores\Combustible;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\User;
use Session;
use Auth;

class VehiculoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::where('estado','ÓPTIMO')->get();
    	return view('automotives.automotive.vehiculo.index',compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('type','Conductor')->get();
        $oils  = Combustible::all();
        return view('automotives.automotive.vehiculo.create', compact('users','oils'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'estado' => 'required|in:ÓPTIMO,MANTENIMIENTO,DESUSO',
            'placa'  => 'required|string|min:4|max:12|unique:vehiculos',
            'tipo'   => 'required',
            'pasajeros' => 'required' 
                    ]);
       // return $request;
        //Vehiculo::create($request->all());
        
        if($request->get('user_id') === null ){
            $user =  0;  
        }else{
            $user =  $request->get('user_id');
        }
        
        $vehiculo = new Vehiculo;
        $vehiculo->user_id = $user;
        $vehiculo->kilometraje = $request->get('kilometraje');
        $vehiculo->estado  = $request->get('estado');
        $vehiculo->placa   = $request->get('placa');
        $vehiculo->tipo    = $request->get('tipo');
        $vehiculo->especificacion = $request->get('especificacion');
        $vehiculo->cilindrada = $request->get('cilindrada');
        $vehiculo->modelo     = $request->get('modelo');
        $vehiculo->color      = $request->get('color');
        $vehiculo->pasajeros = $request->get('pasajeros');
        $vehiculo->chasis    = $request->get('chasis');
        $vehiculo->marca      = $request->get('marca');
        $vehiculo->motor      = $request->get('motor');
        $vehiculo->save();

        $vehiculo->combustibles()->attach($request->get('oil_id'));
        
        Session::flash('message','El vehículo se inserto correctamente...');
        return redirect('vehiculos');
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

        //dd($id);
        $users = User::where('type','Conductor')->get();
        $vehiculo = Vehiculo::find($id);
        $oils  = Combustible::all();
        //dd($user);
        return view('automotives.automotive.vehiculo.edit',compact('vehiculo','users','oils'));
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
        return $request;
        
        Session::flash('message','La devolución fue editada corréctamente!!!');
        return redirect('devoluciones');
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
