<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Uatfinfra\ModelAutomotores\Viaje;
use Uatfinfra\ModelAutomotores\Presupuesto;
use Uatfinfra\ModelAutomotores\Destino;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
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

        return view('automotives.automotive.viaje.create', compact('vehiculos','destinos','encargados','conductores'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
        
        $viaje = new Viaje;
        $viaje->tipo          = $request->get('tipo');
        $viaje->encargado_id  = $request->get('encargado');
        $viaje->entidad       = $request->get('entidad');
        $viaje->dias          = $request->get('dias');
        $viaje->pasajeros     = $request->get('pasajeros');
        $viaje->fecha_inicial = Carbon::parse($request->get('fecha_inicial'));
        $viaje->fecha_final   = Carbon::parse($request->get('fecha_final'));
        $viaje->horainicial = $request->get('horainicial');
        $viaje->horafinal   = $request->get('horafinal');
        $viaje->categoria   = $request->get('categoria');
        $viaje->nota        = $request->get('nota');
        $viaje->recurso     = $request->get('recurso');
        $viaje->estado      = "activo";
        $viaje->reserva_id  = null;
        $viaje->vehiculo_id = $request->get('vehiculo_id');
        $viaje->save();
        
        $viaje->conductores()->attach($request->get('conductor'));
        
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
        
        //return back()->with('flash','Viaje creado completado correctamente...');
        Session::flash('message','El viaje fue creado correctamente...');
        return redirect('viajes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Uatfinfra\Viaje  $viaje
     * @return \Illuminate\Http\Response
     */
    public function show(Viaje $viaje)
    {
        //
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
        return view('automotives.automotive.viaje.edit',compact('viaje','presupuesto','vehiculos','destinos','encargados','conductores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Uatfinfra\Viaje  $viaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Viaje $viaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Uatfinfra\Viaje  $viaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Viaje $viaje)
    {
        //
    }
}
