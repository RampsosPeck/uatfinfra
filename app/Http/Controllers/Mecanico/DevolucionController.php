<?php

namespace Uatfinfra\Http\Controllers\Mecanico;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\ModelMecanico\Devolucion;
use Uatfinfra\ModelMecanico\Pedido;
use Uatfinfra\ModelSolicitudes\Solicitud;
use Illuminate\Http\Request;
use Session;
use Uatfinfra\User;

class DevolucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devoluciones = Devolucion::orderBy('id','DESC')->get();
        //dd($devoluciones);
        return view('mecanicos.devoluciones.index',compact('devoluciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    } 
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Devolucion::create($request->all());
        //Devolucion::where('id',$request->sol_id)->update(['active'=>false]);
        Session::flash('message','La devolución  se guardo correctamente...');
        return redirect('devoluciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Uatfinfra\ModelMecanico\Devolucion  $devolucion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return $id;
        $solicitud = Solicitud::where('id',$id)->first();
        $si = 1;
        return view('mecanicos.devoluciones.create',compact('solicitud','si'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Uatfinfra\ModelMecanico\Devolucion  $devolucion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return $id;
        $devolucion = Devolucion::where('id',$id)->first();
        return view('mecanicos.devoluciones.edit',compact('devolucion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Uatfinfra\ModelMecanico\Devolucion  $devolucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return dd($id);
        //return dd($devolucion);
        $devolucion = Devolucion::find($id);
        $devolucion->update($request->all());
        $devolucion->save();  
        Session::flash('message','La devolución fue ACTUALIZADA correctamente...');
        return redirect('devoluciones');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Uatfinfra\ModelMecanico\Devolucion  $devolucion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        Devolucion::destroy($id);
        Session::flash('message','La devolución fue eliminada correctamente...');
        return redirect('devoluciones');
    }
}
