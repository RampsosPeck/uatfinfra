<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Uatfinfra\ModelAutomotores\Viaje;
use Uatfinfra\ModelAutomotores\Ruta;
use Uatfinfra\ModelAutomotores\Presupuesto;
use Uatfinfra\ModelAutomotores\Destino;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Uatfinfra\ModelAutomotores\Tipo;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\Http\Requests\ViajeSaveRequest;
use Uatfinfra\User;
use Carbon\Carbon;
use Session;
use Auth;

class ViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viajes =  Viaje::all();
        return view('automotives.automotive.viaje.index',compact('viajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculos  = Vehiculo::all();
        $destinos   = Destino::all();
        $encargados = User::where('type','Enc. de Viaje')->where('active',true)->get();
        $conductores= User::where('type','Conductor')->where('active',true)->get();
        $categorias = Tipo::all();

        return view('automotives.automotive.viaje.create', compact('vehiculos','destinos','encargados','conductores','categorias'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ViajeSaveRequest $request)
    {
        //return $request;
        //$cantivia = Viaje::count();
        $año = intval(date("Y"));
        $desde = $año."-01-01";
        $hasta = $año."-12-31";
        $cantivia = Viaje::whereBetween('fecha_inicial',[$desde,$hasta])->count()+1;
        //dd($cantivia);
        $date = date('y');
        //dd($date);
        $coding = "$cantivia"."/".$date;
        //dd($coding);
        
        //$viaje->fecha_inicial = Carbon::parse($request->get('fecha_inicial'));
        $fi = $request->get('fecha_final');
        $fi = $fi.' 23:59:59';

        $fix = $fi;
        if(!empty($request->get('fecha_final2'))) 
        {
            $fini2 = Carbon::parse($request->get('fecha_inicial2'));

            $fi2 = $request->get('fecha_final2');
            $fi2 = $fi2.' 23:59:59';

            $fix = $fi2;

            $hini2 = $request->get('horainicial2');
            $hfin2 = $request->get('horafinal2');
        
        }else{
            $fini2 = null;
            $fi2 = null;
            $hini2 = null;
            $hfin2 = null;
        }
        if(!empty($request->get('fecha_final3'))) 
        {
            $fini3 = Carbon::parse($request->get('fecha_inicial3'));

            $fi3 = $request->get('fecha_final3');
            $fi3 = $fi3.' 23:59:59';

            $fix = $fi3;

            $hini3 = $request->get('horainicial3');
            $hfin3 = $request->get('horafinal3');
        
        }else{
            $fini3 = null;
            $fi3 = null;
            $hini3 = null;
            $hfin3 = null;
        }
        if(!empty($request->get('fecha_final4'))) 
        {
            $fini4 = Carbon::parse($request->get('fecha_inicial4'));

            $fi4 = $request->get('fecha_final4');
            $fi4 = $fi4.' 23:59:59';

            $fix = $fi4;

            $hini4 = $request->get('horainicial4');
            $hfin4 = $request->get('horafinal4');
        
        }else{
            $fini4 = null;
            $fi4 = null;
            $hini4 = null;
            $hfin4 = null;
        }
        if(!empty($request->get('fecha_final5'))) 
        {
            $fini5 = Carbon::parse($request->get('fecha_inicial5'));

            $fi5 = $request->get('fecha_final5');
            $fi5 = $fi5.' 23:59:59';

            $fix = $fi5;

            $hini5 = $request->get('horainicial5');
            $hfin5 = $request->get('horafinal5');
        
        }else{
            $fini5 = null;
            $fi5 = null;
            $hini5 = null;
            $hfin5 = null;
        }

        $encarsuper = User::where([
                    ['type', '=', "Supervisor"],
                    ['position', '=', "AUTOMOTORES"]
                ])->pluck('name');
        //return $fi;

        $viaje = new Viaje;
        $viaje->codigo        = $coding;
        $viaje->tipo          = $request->get('tipo');
        $viaje->encargado_id  = $request->get('encargado');
        $viaje->entidad       = $request->get('entidad');
        $viaje->dias          = $request->get('dias');
        $viaje->pasajeros     = $request->get('pasajeros');
        $viaje->fecha_inicial = Carbon::parse($request->get('fecha_inicial'));
        $viaje->fecha_final   = $fi;
        $viaje->horainicial = $request->get('horainicial');
        $viaje->horafinal   = $request->get('horafinal');
        $viaje->fecha_inicial2 = $fini2;
        $viaje->fecha_final2   = $fi2;
        $viaje->horainicial2 = $hini2;
        $viaje->horafinal2   = $hfin2;
        $viaje->fecha_inicial3 = $fini3;
        $viaje->fecha_final3   = $fi3;
        $viaje->horainicial3 = $hini3;
        $viaje->horafinal3   = $hfin3;
        $viaje->fecha_inicial4 = $fini4;
        $viaje->fecha_final4   = $fi4;
        $viaje->horainicial4 = $hini4;
        $viaje->horafinal4   = $hfin4;
        $viaje->fecha_inicial5 = $fini5;
        $viaje->fecha_final5   = $fix;
        $viaje->horainicial5 = $hini5;
        $viaje->horafinal5   = $hfin5;
        $viaje->nota        = $request->get('nota');
        $viaje->recurso     = $request->get('recurso');
        $viaje->estado      = "activo";
        $viaje->reserva_id  = null;
        $viaje->vehiculo_id = $request->get('vehiculo_id');
        $viaje->supervisor   = $encarsuper[0];
        $viaje->save();

        $viaje->conductores()->attach($request->get('conductor'));

        $viaje->tipos()->attach($request->get('categoria'));

        //return $viaje->id;

        $presupuesto = new Presupuesto;
        $presupuesto->viaje_id= $viaje->id;
        $presupuesto->combustible= $request->get('combustible');
        $presupuesto->totalcombu = $request->get('totalcombu');
        $presupuesto->precio     = $request->get('precio');
        $presupuesto->totalprecio= $request->get('totalprecio');
        $presupuesto->canpeaje   = $request->get('canpeaje');
        $presupuesto->prepeaje   = $request->get('prepeaje');
        $presupuesto->totpeaje   = $request->get('totpeaje');
        $presupuesto->cangaraje  = $request->get('cangaraje');
        $presupuesto->pregaraje  = $request->get('pregaraje');
        $presupuesto->totgaraje  = $request->get('totgaraje');
        $presupuesto->nommante   = $request->get('nommante');
        $presupuesto->canmante   = $request->get('canmante');
        $presupuesto->premante   = $request->get('premante');
        $presupuesto->totmante   = $request->get('totmante');
        $presupuesto->canviaciu  = $request->get('canviaciu');
        $presupuesto->previaciu  = $request->get('previaciu');
        $presupuesto->totviaciu  = $request->get('totviaciu');
        $presupuesto->canviapro  = $request->get('canviapro');
        $presupuesto->previapro  = $request->get('previapro');
        $presupuesto->totviapro  = $request->get('totviapro');
        $presupuesto->canviafro  = $request->get('canviafro');
        $presupuesto->previafro  = $request->get('previafro');
        $presupuesto->totviafro  = $request->get('totviafro');
        $presupuesto->totprebol  = $request->get('totprebol');
        $presupuesto->ruta1      = $request->get('ruta1');
        $presupuesto->cantidad1  = $request->get('cantidad1');
        $presupuesto->precio1    = $request->get('precio1');
        $presupuesto->total1     = $request->get('total1');
        $presupuesto->ruta2      = $request->get('ruta2');
        $presupuesto->cantidad2  = $request->get('cantidad2');
        $presupuesto->precio2    = $request->get('precio2');
        $presupuesto->total2      = $request->get('total2');
        $presupuesto->vueltas     = $request->get('vueltas');
        $presupuesto->preciovuelta= $request->get('preciovuelta');
        $presupuesto->totalvuelta = $request->get('totalvuelta');
        $presupuesto->totalpublico= $request->get('totalpublico');
        $presupuesto->totaldiferencia= $request->get('totaldiferencia');
        $presupuesto->save();

        $ruta = new Ruta;
        $ruta->destino1  = $request->get('destino1');
        $ruta->kilo1     = $request->get('kilo1');
        $ruta->destino2  = $request->get('destino2');
        $ruta->kilo2     = $request->get('kilo2');
        $ruta->destino3  = $request->get('destino3');
        $ruta->kilo3     = $request->get('kilo3');
        $ruta->destino4  = $request->get('destino4');
        $ruta->kilo4     = $request->get('kilo4');
        $ruta->destino5  = $request->get('destino5');
        $ruta->kilo5     = $request->get('kilo5');
        $ruta->destino6  = $request->get('destino6');
        $ruta->kilo6     = $request->get('kilo6');
        $ruta->adicional = $request->get('adicional');
        $ruta->totalkm   = $request->get('totalkm');
        $ruta->viaje_id  = $viaje->id;
        $ruta->save();

        if ($request->get('reserva')  != "no" ) {
            $re =intval($request->get('reserva'));
            \DB::table('reservations')->where('id',$re)->delete();
        }

        //return back()->with('flash','Viaje creado completado correctamente...');
        Session::flash('message','El viaje fue creado correctamente...');
        return redirect('calendario');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Uatfinfra\Viaje  $viaje
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

    //    $destino3 = Destino::where('id',$ruta->destino3)->first() ? 'null' : 'nulo';
        //dd($destino3);
    //    $destino4 = Destino::where('id',$ruta->destino4)->first() ? 'null' : 'nulo';
    //    $destino5 = Destino::where('id',$ruta->destino5)->first() ? 'null' : 'nulo';
    //    $destino6 = Destino::where('id',$ruta->destino6)->first() ? 'null' : 'nulo';

        //$supervisor = User::where('type', 'Supervisor')->where('position', 'AUTOMOTORES')->first();

        $view =  \View::make('automotives.automotive.viaje.presupuestoPDF', compact('date', 'presupuesto','destino1','destino2','destino3','destino4','destino5','destino6','ruta','viaje'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'portrat');
        return $pdf->stream('Presupuesto'.$viaje->id.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Uatfinfra\Viaje  $viaje
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculos  = Vehiculo::all();
        $destinos   = Destino::all();
        $encargados = User::where('type','Enc. de Viaje')->where('active',true)->get();
        //dd($encargados);
        $conductores= User::where('type','Conductor')->where('active',true)->get();
        $viaje = Viaje::find($id);
        //dd($viaje);
        $presupuesto = Presupuesto::where('viaje_id',$id)->first();
        //dd($presupuesto);
        $ruta = Ruta::where('viaje_id',$id)->first();
        //dd($ruta);
        $categorias = Tipo::all();

        return view('automotives.automotive.viaje.edit',compact('viaje','presupuesto','ruta','vehiculos','destinos','encargados','conductores','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Uatfinfra\Viaje  $viaje
     * @return \Illuminate\Http\Response
     */
    public function update(ViajeSaveRequest $request, $id)
    {
        //dd($request);
        $fi = $request->get('fecha_final');
        $fi = $fi.' 23:59:59';

        $fix = $fi;
        if(!empty($request->get('fecha_inicial2')))
        {
            $fini2 = Carbon::parse($request->get('fecha_inicial2'));

            $fi2 = $request->get('fecha_final2');
            $fi2 = $fi2.' 23:59:59';

            $fix = $fi2;

            $hini2 = $request->get('horainicial2');
            $hfin2 = $request->get('horafinal2');
        }else{
            $fini2 = null;
            $fi2 = null;
            $hini2 = null;
            $hfin2 = null;
        }
        if(!empty($request->get('fecha_inicial3')))
        {
            $fini3 = Carbon::parse($request->get('fecha_inicial3'));

            $fi3 = $request->get('fecha_final3');
            $fi3 = $fi3.' 23:59:59';

            $fix = $fi3;

            $hini3 = $request->get('horainicial3');
            $hfin3 = $request->get('horafinal3');
        }else{
            $fini3 = null;
            $fi3 = null;
            $hini3 = null;
            $hfin3 = null;
        }      
        if(!empty($request->get('fecha_inicial4')))
        {
            $fini4 = Carbon::parse($request->get('fecha_inicial4'));

            $fi4 = $request->get('fecha_final4');
            $fi4 = $fi4.' 23:59:59';

            $fix = $fi4;

            $hini4 = $request->get('horainicial4');
            $hfin4 = $request->get('horafinal4');
        }else{
            $fini4 = null;
            $fi4 = null;
            $hini4 = null;
            $hfin4 = null;
        }
        if(!empty($request->get('fecha_inicial5')))
        {
            $fini5 = Carbon::parse($request->get('fecha_inicial5'));

            $fi5 = $request->get('fecha_final5');
            $fi5 = $fi5.' 23:59:59';

            $fix = $fi5;

            $hini5 = $request->get('horainicial5');
            $hfin5 = $request->get('horafinal5');
        }else{
            $fini5 = null;
            $fi5 = null;
            $hini5 = null;
            $hfin5 = null;
        }

        $encarsuper = User::where([
                    ['type', '=', "Supervisor"],
                    ['position', '=', "AUTOMOTORES"]
                ])->pluck('name');

        //return $request;
        $viaje = Viaje::find($id);
        $viaje->tipo          = $request->get('tipo');
        $viaje->encargado_id  = $request->get('encargado');
        $viaje->entidad       = $request->get('entidad');
        $viaje->dias          = $request->get('dias');
        $viaje->pasajeros     = $request->get('pasajeros');
        $viaje->fecha_inicial = Carbon::parse($request->get('fecha_inicial'));
        $viaje->fecha_final   = $fi;
        $viaje->horainicial = $request->get('horainicial');
        $viaje->horafinal   = $request->get('horafinal');

        $viaje->fecha_inicial2 = $fini2;
        $viaje->fecha_final2   = $fi2;
        $viaje->horainicial2 = $hini2;
        $viaje->horafinal2   = $hfin2;
        $viaje->fecha_inicial3 = $fini3;
        $viaje->fecha_final3   = $fi3;
        $viaje->horainicial3 = $hini3;
        $viaje->horafinal3   = $hfin3;
        $viaje->fecha_inicial4 = $fini4;
        $viaje->fecha_final4   = $fi4;
        $viaje->horainicial4 = $hini4;
        $viaje->horafinal4   = $hfin4;
        $viaje->fecha_inicial5 = $fini5;
        $viaje->fecha_final5   = $fix;
        $viaje->horainicial5 = $hini5;
        $viaje->horafinal5   = $hfin5;

        $viaje->nota        = $request->get('nota');
        $viaje->recurso     = $request->get('recurso');
        $viaje->estado      = "activo";
        $viaje->reserva_id  = null;
        $viaje->vehiculo_id = $request->get('vehiculo_id');
        $viaje->supervisor   = $encarsuper[0];
        $viaje->save();

        $viaje->conductores()->sync($request->get('conductor'));

        $viaje->tipos()->sync($request->get('categoria'));

        $presupuesto = Presupuesto::where('viaje_id',$id)->first();
        $presupuesto->viaje_id= $viaje->id;
        $presupuesto->combustible= $request->get('combustible');
        $presupuesto->totalcombu = $request->get('totalcombu');
        $presupuesto->precio     = $request->get('precio');
        $presupuesto->totalprecio= $request->get('totalprecio');
        $presupuesto->canpeaje   = $request->get('canpeaje');
        $presupuesto->prepeaje   = $request->get('prepeaje');
        $presupuesto->totpeaje   = $request->get('totpeaje');
        $presupuesto->cangaraje  = $request->get('cangaraje');
        $presupuesto->pregaraje  = $request->get('pregaraje');
        $presupuesto->totgaraje  = $request->get('totgaraje');
        $presupuesto->nommante   = $request->get('nommante');
        $presupuesto->canmante   = $request->get('canmante');
        $presupuesto->premante   = $request->get('premante');
        $presupuesto->totmante   = $request->get('totmante');
        $presupuesto->canviaciu  = $request->get('canviaciu');
        $presupuesto->previaciu  = $request->get('previaciu');
        $presupuesto->totviaciu  = $request->get('totviaciu');
        $presupuesto->canviapro  = $request->get('canviapro');
        $presupuesto->previapro  = $request->get('previapro');
        $presupuesto->totviapro  = $request->get('totviapro');
        $presupuesto->canviafro  = $request->get('canviafro');
        $presupuesto->previafro  = $request->get('previafro');
        $presupuesto->totviafro  = $request->get('totviafro');
        $presupuesto->totprebol  = $request->get('totprebol');
        $presupuesto->ruta1      = $request->get('ruta1');
        $presupuesto->cantidad1  = $request->get('cantidad1');
        $presupuesto->precio1    = $request->get('precio1');
        $presupuesto->total1     = $request->get('total1');
        $presupuesto->ruta2      = $request->get('ruta2');
        $presupuesto->cantidad2  = $request->get('cantidad2');
        $presupuesto->precio2    = $request->get('precio2');
        $presupuesto->total2      = $request->get('total2');
        $presupuesto->vueltas     = $request->get('vueltas');
        $presupuesto->preciovuelta= $request->get('preciovuelta');
        $presupuesto->totalvuelta = $request->get('totalvuelta');
        $presupuesto->totalpublico= $request->get('totalpublico');
        $presupuesto->totaldiferencia= $request->get('totaldiferencia');
        $presupuesto->save();

        $ruta = Ruta::where('viaje_id',$id)->first();
        $ruta->destino1  = $request->get('destino1');
        $ruta->kilo1     = $request->get('kilo1');
        $ruta->destino2  = $request->get('destino2');
        $ruta->kilo2     = $request->get('kilo2');
        $ruta->destino3  = $request->get('destino3');
        $ruta->kilo3     = $request->get('kilo3');
        $ruta->destino4  = $request->get('destino4');
        $ruta->kilo4     = $request->get('kilo4');
        $ruta->destino5  = $request->get('destino5');
        $ruta->kilo5     = $request->get('kilo5');
        $ruta->destino6  = $request->get('destino6');
        $ruta->kilo6     = $request->get('kilo6');
        $ruta->adicional = $request->get('adicional');
        $ruta->totalkm   = $request->get('totalkm');
        $ruta->viaje_id  = $viaje->id;
        $ruta->save();

        Session::flash('message','El viaje fue ACTUALIZADO correctamente...');
        return redirect('calendario');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Uatfinfra\Viaje  $viaje
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Viaje::where('id',$id)
            ->update(['estado' => 'cancelado']);

        Session::flash('message','El viaje fue CANCELADO correctamente...');
        return redirect('viajes');
    }

}
