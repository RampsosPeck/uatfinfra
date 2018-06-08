<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Uatfinfra\ModelAutomotores\Viaje;
use Uatfinfra\ModelAutomotores\Presupuesto;
use Uatfinfra\ModelMecanico\Devolucion;
use Uatfinfra\ModelSolicitudes\Solicitud;
use Uatfinfra\ModelAutomotores\Ruta;
use Uatfinfra\ModelAutomotores\Destino;
use Uatfinfra\User;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Session;
use Auth;
use Carbon\Carbon;
use Redirect;

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
        //AQUI ENTRA EL ESTADO DEL MECANICO DE AUTOMOTORES
        if(!empty($request->comentario) || $request->comentario != null || $request->comentario != "")
        {
            //return "Aqui esta con comentario en la linea";
            $resapro = $request['comentario'];
        }else
        {
            //return "Aqui esta vacio en COMEN";
            if($request->estado == 'APROBADO')
            {
                $resapro = 'La solicitud de trabajo fue APROBADA, el trabajo esta siendo procesado.';
            }else{
                $resapro = 'La solicitud de trabajo se encuentra en ESPERA, comuniquese con el encargado de AUTOMOTORES.';
            }
        }
                 

        $a = intval($request->idsolicitud);
        //dd($a);
        Solicitud::where('id',$a)->update([
                'estado' => $request['estado'],
                'comentario' => $resapro
                    ]);
 
        Session::flash('message', "El estado fue actualizado.");
        return Redirect::back();
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
        
        $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
           'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        $arrayDias = array( 'Domingo', 'Lunes', 'Martes',
               'Miercoles', 'Jueves', 'Viernes', 'Sabado');
        $date = $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');
        $hour = date('H:m A');

        $destino1 = Destino::where('id',$ruta->destino1)->first();
        $destino2 = Destino::where('id',$ruta->destino2)->first();
        $destino3 = Destino::where('id',$ruta->destino3)->first();
        //dd($destino3);
        $destino4 = Destino::where('id',$ruta->destino4)->first();
        $destino5 = Destino::where('id',$ruta->destino5)->first();
        $destino6 = Destino::where('id',$ruta->destino6)->first();

        $supervisor = User::where('type', 'Supervisor')->where('position', 'AUTOMOTORES')->first(); 

        if($viaje->recurso == "viajeuatf")
        {
            $recurso = "U.A.T.F.";
        }else{
            $recurso = "PROPIOS";
        }

        $view =  \View::make('automotives.automotive.viaje.hojarutaPDF', compact('date', 'presupuesto','destino1','destino2','destino3','destino4','destino5','destino6','ruta','viaje','supervisor','recurso','hour'))->render();
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
    public function update(Request $request)
    {
        
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
