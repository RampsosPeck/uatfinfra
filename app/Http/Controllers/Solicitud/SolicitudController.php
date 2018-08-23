<?php

namespace Uatfinfra\Http\Controllers\Solicitud;
use Uatfinfra\ModelSolicitudes\Solicitud;
use Uatfinfra\ModelSolicitudes\Tag;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\Http\Requests\SolMeSaveRequest;
use Carbon\Carbon;
use Uatfinfra\User;
use Session;
use Auth;
use Alert;
use Toastr;


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
        $tags = Tag::all();
        return view('solicitudes.mecanico.solicitud.index',compact('solicitudes','vehiculos','tags'));
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
        //dd($request);
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

        $solicitud->tags()->attach($request->get('tags'));

        //Session::flash('message','La solicitud de trabajo para el mecanico se creo correctamente...');
        Alert::success('Solicitud de trabajo para el mecánico se creo correctamente...!!!');
        Toastr::success('La solicitud de trabajo para el mecánico se creo correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);

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
        //dd($id);
        $solicitud = Solicitud::find($id);
        $vehiculos = Vehiculo::all(); 
        $tag       = \DB::table('solicitud_tag')->where('solicitud_id', $id )->get();
        $a=0;$b=0;$c=0;$d=0;
        foreach($tag as $ta)
        {
            if($ta->tag_id == 1)
            {
                $a = $ta->tag_id;
            }
            if($ta->tag_id == 2)
            {
                $b = $ta->tag_id;
            }
            if($ta->tag_id == 3)
            {
                $c = $ta->tag_id;
            }
            if($ta->tag_id == 4)
            {
                $d = $ta->tag_id;
            } 
        }
        //dd($tag[0]->tag_id); 
        return view('solicitudes.mecanico.solicitud.edit',compact('solicitud','vehiculos','a','b','c','d'));

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

        $solicitud->tags()->sync($request->get('tags'));

        //Session::flash('message','La solicitud fue EDITADA correctamente...');
        Alert::info('La solicitud fue EDITADA correctamente...!!!');
        Toastr::success('La solicitud fue EDITADA correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
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
        //Session::flash('message','La solicitud fue eliminada correctamente...');
         Alert::error('La solicitud fue eliminada correctamente...!!!');
        Toastr::warning('La solicitud fue eliminada correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
        return redirect('solicitudes');
    }
}

