<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Uatfinfra\ModelAutomotores\Viaje;
use Uatfinfra\ModelAutomotores\Presupuesto;
use Uatfinfra\ModelAutomotores\Ruta;
use Uatfinfra\ModelAutomotores\Destino;
use Uatfinfra\User;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Session;
use Auth;
use Carbon\Carbon;


class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "estas aqui";
         $viajes = Viaje::all();
        return view('automotives.automotive.viaje.calendario',compact('viajes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$data  = array();
        $id    = Viaje::all()->pluck('id');
        $title = Viaje::all()->pluck('entidad');
        $start = Viaje::all()->pluck('fecha_inicial');
        $end   = Viaje::all()->pluck('fecha_final');
        $count = count($id);
        $estado= Viaje::all()->pluck('estado');

        for($i=0; $i<$count; $i++) {
            $data[$i] = array(
                "title" => $title[$i],
                "start" => $start[$i],
                "end"   => $end[$i],
                "estado"=> $estado[$i],
                "url"   => "/viajes/".$id[$i]
            );
        }
        return response()->json($data);
        */
        $viajes = Viaje::all();
        return view('automotives.automotive.viaje.calendario',compact('viajes'));
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
        $viaje = Viaje::find($id);
        $presupuesto = Presupuesto::where('viaje_id',$viaje->id)->first();
        $ruta = Ruta::where('viaje_id',$viaje->id)->first();
        return view('automotives.automotive.viaje.show',compact('viaje','presupuesto','ruta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $viaje = Viaje::find($id);
        $presupuesto = Presupuesto::where('viaje_id',$id)->first();
        $ruta  = Ruta::where('viaje_id',$id)->first();
        $date = date('d-m-Y');

        $destino1 = Destino::where('id',$ruta->destino1)->first();
        $destino2 = Destino::where('id',$ruta->destino2)->first();
        $destino3 = Destino::where('id',$ruta->destino3)->first();
        //dd($destino3);
        $destino4 = Destino::where('id',$ruta->destino4)->first();
        $destino5 = Destino::where('id',$ruta->destino5)->first();
        $destino6 = Destino::where('id',$ruta->destino6)->first();

        $supervisor = User::where('type', 'Supervisor')->where('position', 'AUTOMOTORES')->first(); 

        $view =  \View::make('automotives.automotive.viaje.hojarutaPDF', compact('date', 'presupuesto','destino1','destino2','destino3','destino4','destino5','destino6','ruta','viaje','supervisor'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'portrat');
        return $pdf->stream('Hoja de ruta.pdf');
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
