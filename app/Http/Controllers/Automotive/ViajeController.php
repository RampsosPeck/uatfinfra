<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Uatfinfra\ModelAutomotores\Viaje;
use Uatfinfra\ModelAutomotores\Destino;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\User;
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
        return $request;
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
