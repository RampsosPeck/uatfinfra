<?php

namespace Uatfinfra\Http\Controllers\Mecanico;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Uatfinfra\ModelMecanico\Mecanico;
use Uatfinfra\ModelSolicitudes\Solicitud;
use Uatfinfra\ModelSolicitudes\Tag;
use Uatfinfra\Http\Requests\MecaConcreRequest;
use Session;
use Uatfinfra\User;
use Alert;
use Toastr;

class MecanicoController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$solicitudes = Solicitud::all();
		$vehiculos = Vehiculo::all();
		return view('mecanicos.index', compact('solicitudes', 'vehiculos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$vehiculos = Vehiculo::all();
		$tags = Tag::all();
		return view('solicitudes.mecanico.index',compact('vehiculos','tags')); 	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(MecaConcreRequest $request) {

		$meca_id = \DB::table('mecanicos')->insertGetId([
			'sol_id' => $request['sol_id'],
			'kilome' => $request['kilome'],
			'fecha' => $request['fecha'],
			'cantidad' => $request['cantidad'],
			'nombre' => $request['nombre'],
			'descripcion' => $request['descripcion'],
			'marca' => $request['marca'],
			'codigo' => $request['codigo'],
			'observacion' => $request['observacion'],
		]);
		
        Solicitud::where('id',$request->sol_id)->update(['active'=>false]);

		//return Redirect::back()->with('message', 'Expediente actualizado correctamente');
		return Redirect::back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \Uatfinfra\ModelMecanico\Mecanico  $mecanico
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$solicitud = Solicitud::find($id);
		$user = User::find($solicitud->user_id);
		$vehiculo = Vehiculo::find($solicitud->vehiculo_id);
		//dd($solicitud);
		$mecanicos = Mecanico::where('sol_id',$id)->orderBy('id','ASC')->get();
		//dd($mecanicos);
		return view('mecanicos.create', compact('solicitud', 'user', 'vehiculo','mecanicos'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \Uatfinfra\ModelMecanico\Mecanico  $mecanico
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$mecanicos = Mecanico::find($id);
		//dd($mecanico);
		return view('mecanicos.edit',compact('mecanicos'));
	}				

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Uatfinfra\ModelMecanico\Mecanico  $mecanico
	 * @return \Illuminate\Http\Response
	 */
	public function update(MecaConcreRequest $request, Mecanico $mecanico) {
		
		//dd($request);
		//dd($mecanico);
		$mecanicotra = Mecanico::find($mecanico->id);
        $mecanicotra->update($request->all());
        $mecanicotra->save();  


        

        $solicitud = Solicitud::find($request->sol_id);
		$user = User::find($solicitud->user_id);
		$vehiculo = Vehiculo::find($solicitud->vehiculo_id);
		//dd($solicitud);
		$mecanicos = Mecanico::where('sol_id',$request->sol_id)->orderBy('id','ASC')->get();
		//dd($mecanicos);
		
		//Session::flash('message','El trabajo fue ACTUALIZADO correctamente...');
		 Alert::info('El trabajo fue ACTUALIZADO correctamente...!!!');

        Toastr::success('El trabajo fue ACTUALIZADO correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
        
		return view('mecanicos.create', compact('solicitud', 'user', 'vehiculo','mecanicos'));
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \Uatfinfra\ModelMecanico\Mecanico  $mecanico
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Mecanico $mecanico) {
		Mecanico::destroy($mecanico->id);
        //Session::flash('message','Trabajo eliminado correctamente...');
        Alert::error('Trabajo eliminado correctamente...!!!');

        Toastr::warning('Trabajo eliminado correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
        return Redirect::back();


	}

	public function getReporte(Request $request)
	{
		if($request->fecha1 > $request->fecha2)
        {
            return redirect()->route('mecanicos.create')->with('warning','La fecha inicial no debe ser mayor a la fecha final.');
        }
        
        if($request->vehiculo_id == null OR  $request->fecha1 == null OR  $request->fecha2 == null)
        {
            return redirect()->route('mecanicos.create')->with('warning','Inserte el vehículo y las dos fechas...!'); 
        }
        

		//dd($request);
		$vehiculo = Vehiculo::where('id',$request->vehiculo_id)->first();

		$solicitudes = Solicitud::whereBetween('created_at',[$request->fecha1,$request->fecha2])->where('vehiculo_id',$vehiculo->id)->get();

		if(($solicitudes)->isEmpty())
        {
            return redirect()->route('mecanicos.create')->with('warning','No hay trabajos del '. $request->fecha1.' hasta el '. $request->fecha2);            
        }

		//dd($solicitudes);

		$admin = User::where('type','Administrator')->where('position','WEB SITE')->first();
        $jefe = User::where('type','Jefatura')->where('position','INFRAESTRUCTURA')->first();
        $date = date('d-m-Y'); 

        $view =  \View::make('solicitudes.mecanico.pdfReporte', compact('date','admin','jefe','vehiculo','solicitudes'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'portrait');
        return $pdf->stream('Reporte'.$vehiculo->placa.'.pdf'); 
	}

	public function getReportegeneral(Request $request)
	{
		if($request->fecha1 > $request->fecha2)
        {
            return redirect()->route('mecanicos.create')->with('warning','La fecha inicial no debe ser mayor a la fecha final.');
        }
        
        if($request->titulo == null OR  $request->fecha1 == null OR  $request->fecha2 == null)
        {
            return redirect()->route('mecanicos.create')->with('warning','Inserte el vehículo y las dos fechas...!'); 
        }
        

		//dd($request);
		$vehiculos = Vehiculo::orderBy('id','ASC')->get();
		//dd($vehiculos);
		$desde = $request->fecha1; 
		$hasta = $request->fecha2;

		$titulo = $request->titulo;
/*	
		if(($mecanicos)->isEmpty())
        {
            return redirect()->route('mecanicos.create')->with('warning','No hay trabajos del '. $request->fecha1.' hasta el '. $request->fecha2);            
        }
*/

		//dd($mecanicos);

		$admin = User::where('type','Administrator')->where('position','WEB SITE')->first();
        $jefe = User::where('type','Jefatura')->where('position','INFRAESTRUCTURA')->first();
        $date = date('d-m-Y'); 

        $view =  \View::make('solicitudes.mecanico.pdfReportegeneral', compact('date','admin','jefe','vehiculos','desde','hasta','titulo'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'portrait');
        return $pdf->stream('ReporteGeneral'.$date.'.pdf'); 
	}
}
