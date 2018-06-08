<?php

namespace Uatfinfra\Http\Controllers\Servicio;
use Uatfinfra\ModelServicios\Servicio;
use Uatfinfra\ModelServicios\Seccion;
use Uatfinfra\ModelServicios\General;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Session;
use Redirect;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitantes = Servicio::all();
        //dd($secciones);
        return view('servicios.index',compact('solicitantes'));
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
    public function store(Request $request)
    {
        //dd($request->estado);
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
                $resapro = 'La solicitud de trabajo fue OBSERVADA, contactese con el encargado de Servicios Generales.';
            }
        }
                 

        $a = intval($request->idgeneral);
        //dd($a);
        General::where('id',$a)->update([
                'estado' => $request['estado'],
                'comentario' => $resapro
                    ]);

       /* \DB::table('generales')
            ->where('id', $a)
            ->update([
                'estado' => $request['estado'],
                'comentario' => $resapro]);*/

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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