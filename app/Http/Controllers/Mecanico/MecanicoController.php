<?php

namespace Uatfinfra\Http\Controllers\Mecanico;

use Uatfinfra\ModelMecanico\Mecanico;
use Uatfinfra\ModelSolicitudes\Solicitud;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Carbon\Carbon;
use Uatfinfra\User;
use Session;
use Auth;

class MecanicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes =  Solicitud::all();
        $vehiculos = Vehiculo::all();
        return view('mecanicos.index',compact('solicitudes','vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Uatfinfra\ModelMecanico\Mecanico  $mecanico
     * @return \Illuminate\Http\Response
     */
    public function show(Mecanico $mecanico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Uatfinfra\ModelMecanico\Mecanico  $mecanico
     * @return \Illuminate\Http\Response
     */
    public function edit(Mecanico $mecanico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Uatfinfra\ModelMecanico\Mecanico  $mecanico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mecanico $mecanico)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Uatfinfra\ModelMecanico\Mecanico  $mecanico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mecanico $mecanico)
    {
        //
    }
}
