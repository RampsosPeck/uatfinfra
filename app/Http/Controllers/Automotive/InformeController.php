<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Uatfinfra\ModelAutomotores\Informe;
use Uatfinfra\ModelAutomotores\Viaje;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Uatfinfra\User;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\Http\Requests\InfoSaveRequest;
use Session;
use Auth;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informes =  Informe::all();
        return view('automotives.automotive.informes.index',compact('informes'));
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
    public function store(InfoSaveRequest $request)
    {
        //return $request;
        Informe::create($request->all());
        Session::flash('message','Informe del viaje CREADO correctamente...');
        return redirect('informes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Uatfinfra\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viaje = Viaje::where('id',$id)->first();
        //return $viaje;
        $vehiculos  = Vehiculo::all();
        $conductores= User::where('type','Conductor')->where('active',true)->get();
        return view('automotives.automotive.informes.create',compact('viaje','conductores','vehiculos'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Uatfinfra\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informe = Informe::where('id',$id)->first();
        $vehiculos  = Vehiculo::all();
        $viajeCodigo = Viaje::where('id',$informe->viaje_id)->pluck('codigo');
        $conductores= User::where('type','Conductor')->where('active',true)->get();
        return view('automotives.automotive.informes.edit',compact('informe','conductores','vehiculos','viajeCodigo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Uatfinfra\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function update(InfoSaveRequest  $request, $id)
    {
        $informe = Informe::find($id);
        $informe->fill($request->all());
        $informe->save();
        Session::flash('message','El informe fue EDITADO correctamente...');
        return redirect('informes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Uatfinfra\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Informe::destroy($id);
        Session::flash('message','Informe de viaje Eliminado correctamente...');
        return redirect('informes');
    }
    public function getImprimir($id)
    {
        $informe = Informe::find($id);
        $chofer = User::where('id',$informe->conductor)->first();
        $viaje = Viaje::where('id',$informe->viaje_id)->first();
        $encargado = User::where('id',$viaje->encargado_id)->first();
        $supervisor = User::where('type','Supervisor')->where('position','AUTOMOTORES')->first();
        
        if($viaje->recurso == "viajeuatf")
        {
            $recurso = "U.A.T.F.";
        }else{
            $recurso = "PROPIOS";
        }
        
        $jefe  = User::where('type','Jefatura')->where('position','INFRAESTRUCTURA')->first();
        $view =  \View::make('automotives.automotive.informes.pdf', compact('informe','chofer','encargado','viaje','supervisor','jefe','recurso'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'portrait');
        return $pdf->stream('Informe'.$informe->viaje_id.'.pdf');
    }

    public function getAprobar($id)
    {
        $informe = Informe::find($id);
        $kmvehi =Vehiculo::where('id',$informe->vehiculo_id)->pluck('kilometraje');
        $kmtotvi = intval($kmvehi[0]) + intval($informe->kmtotal);
        //dd($kmtotvi);
 
        Vehiculo::where('id',$informe->vehiculo_id)
          ->update(['kilometraje' => $kmtotvi]);

        Informe::where('id',$id)
          ->update(['estado' => "APROBADO"]);  

        Session::flash('message','El informe fue aprobado correctamente, actualizando el km. del vehículo.');
        return redirect('informes');
    }

    public function getObservar($id)
    {
        $informe = Informe::find($id);
        if($informe->estado === "APROBADO") 
        {
            $kmvehiculo = Vehiculo::where('id',$informe->vehiculo_id)->pluck('kilometraje');
            $valor = intval($kmvehiculo[0]) - intval($informe->kmtotal);

            Vehiculo::where('id',$informe->vehiculo_id)
            ->update(['kilometraje' => $valor]);
        }

        Informe::where('id',$id)
          ->update(['estado' => "OBSERVADO"]);

        Session::flash('message','El informe de viaje fue OBSERVADO!!!');
        return redirect('informes');        
    }

}
