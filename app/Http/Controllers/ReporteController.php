<?php

namespace Uatfinfra\Http\Controllers;

use Illuminate\Http\Request;
use Uatfinfra\ModelAutomotores\Viaje;
use Uatfinfra\ModelAutomotores\Informe;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Uatfinfra\User;
use Session;
use Auth;


class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viajes = Viaje::where('estado','activo')->get();
        return view('reportes.index', compact('viajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viajes = Viaje::where('estado','activo')->get();
        return view('reportes.create', compact('viajes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dd($request);
        if($request->fecha1 > $request->fecha2)
        {
            return redirect()->route('declaratorias')->with('warning','La fecha inicial no debe ser mayor a la fecha final.');
        }
        
        if($request->titulo == null OR  $request->fecha1 == null OR  $request->fecha2 == null)
        {
            return redirect()->route('declaratorias')->with('warning','Inserte el título y las dos fechas...!'); 
        }
        $viajes = \DB::table('viajes')
                    ->whereBetween('fecha_inicial', [$request->fecha1, $request->fecha2])->get();
        //dd($viajes);           
        if(($viajes)->isEmpty())
        {
            return redirect()->route('declaratorias')->with('warning','No hay viajes desde el '. $request->fecha1.' hasta el '. $request->fecha2);            
        }
        //dd($viajes);
        //dd(Informe::where('viaje_id',3)->get());
        foreach($viajes as $viaje)
        { 
            if( (Informe::where('viaje_id',$viaje->id)->get())->isEmpty()) 
            {
                return redirect()->route('declaratorias')->with('warning','Existe informes de viajes sin realizar...!');
            }
             
        }

        $admin = User::where('type','Administrator')->where('position','WEB SITE')->first();
        $jefe = User::where('type','Jefatura')->where('position','INFRAESTRUCTURA')->first();

        $titulo = $request->titulo;
        $fecha1 = $request->fecha1;
        $fecha2 = $request->fecha2;

        $date = date('d-m-Y');

        $view =  \View::make('automotives.automotive.viaje.pdfDeclaratorias', compact('date','viajes','fecha1','fecha2','titulo','admin','jefe'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'landscape');
        return $pdf->stream('Declaratorias'.$viajes[0]->fecha_inicial.'.pdf');

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
    public function getDeclaratoria()
    {
        $viajes   = Viaje::where('estado','activo')->get();
        $informes = Viaje::where('estado','APROBADO')->get();
        $vehiculos = Vehiculo::get();
        return view('automotives.automotive.viaje.declapdf',compact('viajes','informes','vehiculos'));
    }

    public function getInformeviajes(Request $request)
    {
        //dd($request);
        $viajes = Viaje::whereBetween('fecha_inicial', [date('Y').'-01-01', date('Y').'-12-01'])->get();
        $informes = Informe::whereBetween('fecha_inicial', [date('Y').'-01-01', date('Y').'-12-01'])->get();
        $date = date('d-m-Y');
        $vehiculos = Vehiculo::all();
        $vehis = Vehiculo::where('valor','Ciudad')->get();
        $titulo = $request->titulo;

        $admin = User::where('type','Administrator')->where('position','WEB SITE')->first();
        $jefe = User::where('type','Jefatura')->where('position','INFRAESTRUCTURA')->first();

        $view =  \View::make('automotives.automotive.viaje.pdfInfoAnual', compact('date','viajes','vehiculos','vehis','admin','jefe','titulo','informes'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'landscape');
        return $pdf->stream('Informe'.date('Y').'.pdf');

    }

    public function getInformevehiculo(Request $request)
    {
        if($request->fecha1 > $request->fecha2)
        {
            return redirect()->route('declaratorias')->with('warning','La fecha inicial no debe ser mayor a la fecha final.');
        }
        
        if($request->titulo == null OR  $request->fecha1 == null OR  $request->fecha2 == null)
        {
            return redirect()->route('declaratorias')->with('warning','Inserte el título, vehículo y las dos fechas...!'); 
        }
        // dd($request);
        $titulo = $request->titulo;

        $viajes = \DB::table('viajes')
                    ->where('vehiculo_id',$request->vehiculo)
                    ->whereBetween('fecha_inicial', [$request->fecha1, $request->fecha2])->get();
        //dd($viajes);
         if(($viajes)->isEmpty())
        {
            return redirect()->route('declaratorias')->with('warning','No hay viajes desde el '. $request->fecha1.' hasta el '. $request->fecha2. ' para el vehículo');            
        }
        //dd($viajes);
        //dd(Informe::where('viaje_id',3)->get());
        foreach($viajes as $viaje)
        { 
            if( (Informe::where('viaje_id',$viaje->id)->get())->isEmpty()) 
            {
                return redirect()->route('declaratorias')->with('warning','Existe informes de viajes sin realizar...!');
            }
             
        }

        $admin = User::where('type','Administrator')->where('position','WEB SITE')->first();
        $jefe = User::where('type','Jefatura')->where('position','INFRAESTRUCTURA')->first();
        $date = date('d-m-Y');
        $vehiculo = Vehiculo::where('id',$request->vehiculo)->first();

        $view =  \View::make('automotives.automotive.viaje.pdfInfoVehi', compact('date','viajes','admin','jefe','titulo','vehiculo'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'portrait');
        return $pdf->stream('Informe'.$vehiculo->placa.'.pdf'); 

    }

}
