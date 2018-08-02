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

        $supervisor = User::where('type','Supervisor')->where('position','AUTOMOTORES')->first();
        $jefe = User::where('type','Jefatura')->where('position','INFRAESTRUCTURA')->first();

        $titulo = $request->titulo;
        $fecha1 = $request->fecha1;
        $fecha2 = $request->fecha2;

        $date = date('d-m-Y');

        $view =  \View::make('automotives.automotive.viaje.pdfDeclaratorias', compact('date','viajes','fecha1','fecha2','titulo','supervisor','jefe'))->render();
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
        $viajes = Viaje::whereBetween('fecha_inicial', [date('Y').'-01-01', date('Y').'-12-01'])->get();

        $vehiculos = Vehiculo::where('estado','ÓPTIMO')->get();

        $view =  \View::make('automotives.automotive.viaje.pdfDeclaratorias', compact('date','viajes','fecha1','fecha2','titulo'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'landscape');
        return $pdf->stream('Declaratorias'.$viajes[0]->fecha_inicial.'.pdf');

    }

}
