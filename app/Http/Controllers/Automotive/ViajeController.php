<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Uatfinfra\ModelAutomotores\Viaje;
use Uatfinfra\ModelAutomotores\Destino;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\User;
use Carbon\Carbon;
use Session;
use Auth;

class ViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculos  = Vehiculo::all();
        $destinos   = Destino::all();
        $encargados = User::where('type','Enc. de Viaje')->where('active',true)->get();
        $conductores= User::where('type','Conductor')->where('active',true)->get();

        return view('automotives.automotive.viaje.create', compact('vehiculos','destinos','encargados','conductores'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $id = \DB::table('viajes')->insertGetId([
            'tipo'     => $request['tipo'], 
            'entidad'  => $request['entidad'],
            'dias'     => $request['dias'],
            'pasajeros'=> $request['pasajeros'], 
            'fecha_inicial'  => $request['fecha_inicial'],
            'fecha_final'    => $request['fecha_final'],
            'horainicial'=> $request['horainicial'], 
            'horafinal'  => $request['horafinal'],
            'categoria'  => $request['categoria'],
            'nota'       => $request['nota'],
            'recurso'    => $request['recurso'],  
            'reserva_id' => null,
            'vehiculo_id'=> $request['vehiculo_id']
        ]);

        //return $request;
        /*
        $viaje = new Viaje;
        $viaje->tipo = ;
        $viaje->entidad = ;
        $viaje->dias = ;
        $viaje->pasajeros = $request->get('pasajeros');
        $viaje->fecha_inicial = Carbon::parse($request->get('fecha_inicial'));
        $viaje->fecha_final = Carbon::parse($request->get('fecha_final'));
        $viaje->horainicial = $request->get('horainicial');
        $viaje->horafinal = $request->get('horafinal');
        $viaje->categoria = $request->get('categoria');
        $viaje->nota = $request->get('nota');
        $viaje->recurso = $request->get('recurso');
        $viaje->reserva_id = null;
        $viaje->vehiculo_id = $request->get('vehiculo_id');
        $viaje->save();
        */
       
        //$viaje->viajedestinos()->attach($request->get('viajedestinos'));
        $viaje->conductores()->attach($request->get('conductor'));

                
        return back()->with('flash','Tu publicación a sido guardada');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \Uatfinfra\Viaje  $viaje
     * @return \Illuminate\Http\Response
     */
    public function show(Viaje $viaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Uatfinfra\Viaje  $viaje
     * @return \Illuminate\Http\Response
     */
    public function edit(Viaje $viaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Uatfinfra\Viaje  $viaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Viaje $viaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Uatfinfra\Viaje  $viaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Viaje $viaje)
    {
        //
    }
}
