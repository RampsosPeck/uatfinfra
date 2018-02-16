<?php

namespace Uatfinfra\Http\Controllers\Solicitud;
use Uatfinfra\ModelSolicitudes\Solicitud;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\Http\Requests\SolMeSaveRequest;
use Carbon\Carbon;
use Uatfinfra\User;
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
    public function store(SolMeSaveRequest $request)
    {
        $año = intval(date("Y"));
        $desde = $año."-01-01";
        $hasta = $año."-12-31";
        $cantisolme = Solicitud::whereBetween('created_at',[$desde,$hasta])->count()+1;
        //dd($cantivia);
        $date = date('y');
        //dd($date);
        $coding = "$cantisolme"."/".$date;

        $date = Carbon::now();
        //dd($date->toFormattedDateString());
        //return $request;
        $solicitud = new Solicitud;
        $solicitud->solmecodi   =  $coding; 
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
    public function show($id)
    {
        //return Solicitud::find($id);
        $solicitud = Solicitud::find($id);
        $supervisor = User::where('type','Supervisor')->where('position','AUTOMOTORES')->first();
        $jefe  = User::where('type','Jefatura')->where('position','INFRAESTRUCTURA')->first();
        
        $view =  \View::make('solicitudes.mecanico.solicitud.pdf', compact('solicitud','supervisor','jefe'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'portrait');
        return $pdf->stream('Solicitud'.$solicitud->id.'.pdf');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Uatfinfra\ModelAutomotores\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return Solicitud::find($id);
        $solicitud = Solicitud::find($id);
        $vehiculos = Vehiculo::all();
        return view('solicitudes.mecanico.solicitud.edit',compact('solicitud','vehiculos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Uatfinfra\ModelAutomotores\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(SolMeSaveRequest $request, $id)
    {
        $date = Carbon::now();
        
        $solicitud = Solicitud::find($id);
        $solicitud->vehiculo_id =  $request['vehiculo_id'];
        $solicitud->user_id     =  Auth::user()->id;
        $solicitud->descripcion =  $request['descripcion'];
        $solicitud->fecha       =  $date->toFormattedDateString();
        $solicitud->save();



        Session::flash('message','La solicitud fue EDITADA correctamente...');
        return redirect('solicitudes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Uatfinfra\ModelAutomotores\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Solicitud::destroy($id);
        Session::flash('message','La solicitud fue eliminada correctamente...');
        return redirect('solicitudes');
    }
}
