<?php

namespace Uatfinfra\Http\Controllers\Mecanico;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller; 
use Uatfinfra\ModelMecanico\Pedido; 
use Uatfinfra\ModelSolicitudes\Solicitud;
use Uatfinfra\Http\Requests\PedidoSaveRequest;
use Session;
use Uatfinfra\User;
use Alert;
use Toastr;

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
    public function store(PedidoSaveRequest $request)
    {
        //dd($request);
        $año = intval(date("Y"));
        $desde = $año."-01-01";
        $hasta = $año."-12-31";
        $cantivia = Pedido::whereBetween('created_at',[$desde,$hasta])->count()+1;
        //dd($cantivia);
        $date = date('y');
        //dd($date);
        $coding = "$cantivia"."/".$date;

        //Pedido::create($request->all());

        $pedido = new Pedido;
        $pedido->sol_id        = $request->get('sol_id');
        $pedido->pedicodi      = $coding;
        $pedido->estado        = $request->get('estado');
        $pedido->kilome        = $request->get('kilome');
        $pedido->idh           = $request->get('idh');
        $pedido->justificacion = $request->get('justificacion');
        $pedido->observacion   = $request->get('observacion');
        $pedido->cant1         = $request->get('cant1');
        $pedido->med1          = $request->get('med1');
        $pedido->cant2         = $request->get('cant2');
        $pedido->med2          = $request->get('med2');
        $pedido->cant3         = $request->get('cant3');
        $pedido->med3          = $request->get('med3');
        $pedido->cant4         = $request->get('cant4');
        $pedido->med4          = $request->get('med4');
        $pedido->cant5         = $request->get('cant5');
        $pedido->med5          = $request->get('med5');
        $pedido->cant6         = $request->get('cant6');
        $pedido->med6          = $request->get('med6');
        $pedido->cant7         = $request->get('cant7');
        $pedido->med7          = $request->get('med7');
        $pedido->cant8         = $request->get('cant8');
        $pedido->med8          = $request->get('med8');
        $pedido->cant9         = $request->get('cant9');
        $pedido->med9          = $request->get('med9'); 
        $pedido->cant10        = $request->get('cant10');
        $pedido->med10         = $request->get('med10');
        $pedido->cant11        = $request->get('cant11');
        $pedido->med11         = $request->get('med11'); 
        $pedido->des1          = $request->get('des1');
        $pedido->des2          = $request->get('des2');
        $pedido->des3          = $request->get('des3');
        $pedido->des4          = $request->get('des4'); 
        $pedido->des5          = $request->get('des5');
        $pedido->des6          = $request->get('des6');
        $pedido->des7          = $request->get('des7');
        $pedido->des8          = $request->get('des8');
        $pedido->des9          = $request->get('des9');
        $pedido->des10         = $request->get('des10');
        $pedido->des11         = $request->get('des11');
        $pedido->save();

        Solicitud::where('id',$request->sol_id)->update(['active'=>false]);
        
        //Session::flash('message','El pedido se inserto correctamente...');

        Alert::success('El pedido se inserto correctamente...!!!');
        Toastr::success('El pedido se inserto correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
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
    public function update(PedidoSaveRequest $request, Pedido $pedido)
    {
        //dd( $pedido );
        $pedido = Pedido::find($pedido->id);
        $pedido->update($request->all());
        $pedido->save();  

        //Session::flash('message','El pedido fue ACTUALIZADO correctamente...');
        Alert::info('El pedido fue ACTUALIZADO correctamente...!!!');
        Toastr::success('El pedido fue ACTUALIZADO correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
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
        
        //Session::flash('message','Pedido eliminado correctamente...');
        Alert::error('Pedido eliminado correctamente...!!!');
        Toastr::warning('Pedido eliminado correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
        return redirect('pedidos');
    }

    public function getImprimir($id)
    {
        //return $id;
        $pedido = Pedido::find($id);

        $solicitud = Solicitud::where('id',$pedido->sol_id)->first();
        
        $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
           'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        $arrayDias = array( 'Domingo', 'Lunes', 'Martes',
               'Miercoles', 'Jueves', 'Viernes', 'Sabado');
        $date = $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');
        $hour = date('H:m A');

        $jefe  = User::where('type','Jefatura')->where('position','INFRAESTRUCTURA')->first();
        $date = date('d-m-Y');
        $y = date('Y');
        $m = date('m');
        $d = date('d');

        $meca  = User::where('type','Mecánico')->where('position','INFRAESTRUCTURA')->first();

        $view =  \View::make('mecanicos.pedidos.pdf', compact('pedido','solicitud','jefe','date','hour','date','y','m','d','meca'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'portrait');
        return $pdf->stream('Pedido Nro.'.$pedido->id.'.pdf');

    }


}
