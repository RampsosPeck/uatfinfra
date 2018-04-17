<?php

namespace Uatfinfra\Http\Controllers\Servicio;

use Uatfinfra\ModelServicios\Servicio;
use Uatfinfra\ModelServicios\Carpinteria;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\Http\Requests\CarpinteroSaveRequest;
use Carbon\Carbon;
use Uatfinfra\User;
use Session;
use Auth;
class CarpinteriaController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carpinterias = Carpinteria::all();
        $solicitantes = Servicio::all();
        return view('servicios.carpinteria.index',compact('carpinterias','solicitantes'));
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
    public function store(CarpinteroSaveRequest $request)
    {
        //dd($request);
        $año = intval(date("Y"));
        $desde = $año."-01-01";
        $hasta = $año."-12-31";
        $cantivia = Carpinteria::whereBetween('created_at',[$desde,$hasta])->count()+1;
        //dd($cantivia);
        $date = date('y');
        //dd($date);
        $coding = "$cantivia"."/".$date;
        //dd($coding); 
        
        $date = Carbon::now();
        //dd($date->toFormattedDateString());
        //return $request;
        $carpinteria = new Carpinteria;
        $carpinteria->codi_carp   =  $coding; 
        $carpinteria->serv_id     =  $request['serv_id'];
        $carpinteria->descripcion =  $request['descripcion'];
        $carpinteria->responsable =  $request['responsable'];
        $carpinteria->user_id     =  Auth::user()->id;
        $carpinteria->fecha       =  $date->toFormattedDateString();
        $carpinteria->save();
        //dd("echo Jorgito");
        //return $request; Carpinteria::create($request->all());
        //Devolucion::where('id',$request->sol_id)->update(['active'=>false]);
        Session::flash('message','La solicitud de trabajo para CARPINTERÍA fue creada correctamente...!!!');
        return redirect('carpinterias');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 

        $carpinteria = Carpinteria::find($id);
        $supervisor = User::where('type','Supervisor')->where('position','AUTOMOTORES')->first();
        $jefe  = User::where('type','Jefatura')->where('position','INFRAESTRUCTURA')->first();
        
        $view =  \View::make('servicios.carpinteria.pdf', compact('carpinteria','supervisor','jefe'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'portrait');
        return $pdf->stream('Solicitud Carpinteria'.$carpinteria->id.'.pdf');
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solicitantes = Servicio::all();
        $carpinteria = Carpinteria::find($id);
        return view('servicios.carpinteria.edit', compact('solicitantes','carpinteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarpinteroSaveRequest $request, $id)
    {
        //dd($request);
        $date = Carbon::now();
        
        $carpinteria = Carpinteria::find($id);
        $carpinteria->serv_id =  $request['serv_id'];
        $carpinteria->descripcion =  $request['descripcion'];
        $carpinteria->responsable =  $request['responsable'];
        $carpinteria->user_id     =  Auth::user()->id; 
        $carpinteria->fecha       =  $date->toFormattedDateString();
        $carpinteria->save();

        Session::flash('message','La solicitud para el carpintero fue EDITADA correctamente...');
        return redirect('carpinterias');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Carpinteria::destroy($id);
        Session::flash('message','La solicitud para el carpintero fue eliminada correctamente...');
        return redirect('carpinterias');
    }
}
