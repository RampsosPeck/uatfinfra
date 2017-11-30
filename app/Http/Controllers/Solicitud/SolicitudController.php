<?php

namespace Uatfinfra\Http\Controllers\Solicitud;
use Uatfinfra\ModelSolicitudes\Solicitud;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Carbon\Carbon;
use Session;
use Auth;


class SolicitudController extends Controller
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
        return view('solicitudes.mecanico.solicitud.index',compact('solicitudes','vehiculos'));
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
        $date = Carbon::now();
        //dd($date->toFormattedDateString());
        //return $request;
        $solicitud = new Solicitud;
        $solicitud->vehiculo_id =  $request['vehiculo_id'];
        $solicitud->user_id     =  Auth::user()->id;
        $solicitud->descripcion =  $request['descripcion'];
        $solicitud->fecha       =  $date->toFormattedDateString();
        $solicitud->save();

        Session::flash('message','La solicitud de trabajo para el mecanico se creo correctamente...');
        return redirect('solicitudes');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Uatfinfra\ModelAutomotores\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Uatfinfra\ModelAutomotores\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Uatfinfra\ModelAutomotores\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Uatfinfra\ModelAutomotores\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }
}
