<?php

namespace Uatfinfra\Http\Controllers\Mecanico;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\ModelMecanico\Devolucion;
use Uatfinfra\ModelMecanico\Pedido;
use Uatfinfra\ModelSolicitudes\Solicitud;
use Uatfinfra\Http\Requests\DevolutionRequest;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Uatfinfra\User;
use Alert;
use Toastr;

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
    public function store(DevolutionRequest $request)
    {
        Devolucion::create($request->all());
        //Devolucion::where('id',$request->sol_id)->update(['active'=>false]);
        //Session::flash('message','La devolución  se guardo correctamente...');

        Alert::success('La devolución  se guardo correctamente...!!!');

        Toastr::success('La devolución  se guardo correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
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
        $si = 0;
        $quien = "mecanico";
        //dd($solicitud);
        return view('mecanicos.devoluciones.create',compact('quien','solicitud','si'));    
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
    public function update(DevolutionRequest $request, $id)
    {
        //return dd($id);
        //return dd($devolucion);
        $devolucion = Devolucion::find($id);
        $devolucion->update($request->all());
        $devolucion->save();  
        
        //Session::flash('message','La devolución fue ACTUALIZADA correctamente...');
        Alert::info('La devolución fue ACTUALIZADA correctamente...!!!');

        Toastr::success('La devolución fue ACTUALIZADA correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
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
        
        //Session::flash('message','La devolución fue eliminada correctamente...');
        Alert::error('La devolución fue eliminada correctamente...!!!');

        Toastr::warning('La devolución fue eliminada correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
        return redirect('devoluciones');
    }

    public function getAprobar(Request $request)
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
                $resapro = 'La devolución de material fue APROBADA por el Administrador.';
            }else{
                $resapro = 'La devolución de material fue OBSERVADO, comuniquese con el Administrador.';
            }
        }
                 

        $a = intval($request->idevolucion);
        //dd($a);
        Devolucion::where('id',$a)->update([
                'estado' => $request['estado'],
                'comentario' => $resapro
                    ]);
 
        //Session::flash('message', "El estado fue actualizado.");
        Alert::info('El estado fue actualizado...!!!');

        Toastr::warning('El estado fue actualizado..!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
        return Redirect::back();
    }


}
