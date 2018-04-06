<?php

namespace Uatfinfra\Http\Controllers\Mecanico;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller; 
use Uatfinfra\ModelMecanico\Pedido; 
use Uatfinfra\ModelSolicitudes\Solicitud;
use Session;
use Uatfinfra\User;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::orderBy('id','DESC')->get();
        return view('mecanicos.pedidos.index',compact('pedidos'));
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
        //dd($request);
        Pedido::create($request->all());
        Solicitud::where('id',$request->sol_id)->update(['active'=>false]);
        Session::flash('message','El pedido se inserto correctamente...');
        return redirect('pedidos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Uatfinfra\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return $id;
        $solicitud = Solicitud::find($id);
        //return $solicitud;
        return view('mecanicos.pedidos.create',compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Uatfinfra\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //return $pedido;
        return view('mecanicos.pedidos.edit',compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Uatfinfra\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //dd( $pedido );
        $pedido = Pedido::find($pedido->id);
        $pedido->update($request->all());
        $pedido->save();  
        Session::flash('message','El pedido fue ACTUALIZADO correctamente...');
        return redirect('pedidos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Uatfinfra\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        Pedido::destroy($pedido->id);
        Session::flash('message','Pedido eliminado correctamente...');
        return redirect('pedidos');
    }

    public function getImprimir($id)
    {
        return $id;
           
    }


}
