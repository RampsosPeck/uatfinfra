<?php

namespace Uatfinfra\Http\Controllers\Servicio;

use Uatfinfra\ModelServicios\Servicio;
use Uatfinfra\ModelServicios\General;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\Http\Requests\CarpinteroSaveRequest;
use Carbon\Carbon;
use Uatfinfra\User;
use Session;
use Auth;
class GeneralController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitantes = Servicio::all();
        $generales = General::where('seccion','carpintería')->get();
        return view('servicios.carpinteria.index',compact('solicitantes','generales'));
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
        $cantivia = General::where('seccion',$request->seccion)->whereBetween('created_at',[$desde,$hasta])->count()+1;
        //dd($cantivia);
        $date = date('y');
        //dd($date);
        $coding = "$cantivia"."/".$date;
        //dd($coding); 
        
        $date = Carbon::now();

        if($request->seccion != "mant._general") { 
            $generales = new General;
            $generales->coding   =  $coding; 
            $generales->serv_id     =  $request['serv_id'];
            $generales->seccion     =  $request['seccion'];
            $generales->descripcion =  $request['descripcion'];
            $generales->responsable =  $request['responsable'];
            $generales->user_id     =  Auth::user()->id;
            $generales->fecha       =  $date->toFormattedDateString();
            $generales->save();

            if ($request->seccion === "eléctrico") {
            Session::flash('message','La solicitud de trabajo para el eléctrico fue creada correctamente...!!!');
            return redirect()->action('Servicio\GeneralController@getElectrico');
            }

            if ($request->seccion === "jardinería") {
                Session::flash('message','La solicitud de trabajo para jardinería fue creada correctamente...!!!');
                return redirect()->action('Servicio\GeneralController@getJardineria');
            }

            if($request->seccion === "mecánico general") { 
                Session::flash('message','La solicitud de trabajo para el mecánico general fue creada correctamente...!!!');
                return redirect()->action('Servicio\GeneralController@getMegeneral');
            }

            if($request->seccion === "albañilería") { 
                Session::flash('message','La solicitud de trabajo para albañilería fue creada correctamente...!!!');
                return redirect()->action('Servicio\GeneralController@getAlbanileria');
            }

            if($request->seccion === "plomería") { 
                Session::flash('message','La solicitud de trabajo para plomería fue creada correctamente...!!!');
                return redirect()->action('Servicio\GeneralController@getPlomeria');
            }

            if($request->seccion === "serv._general") { 
                Session::flash('message','La solicitud de trabajo para serv. general fue creada correctamente...!!!');
                return redirect()->action('Servicio\GeneralController@getSergene');
            }

            Session::flash('message','La solicitud de trabajo fue creada correctamente...!!!');
            return redirect('generales');

        }else{
            $completo = 'EQUIPO:'.$request['equipo'].' MARCA:'.$request['marca'].' MODELO:'.$request['modelo'].' CÓDIGO:'.$request['codigo'].' SERIE:'.$request['serie'].' OTROS:'.$request['otros'].' DESCRIPCIÓN'.$request['descripcion'];
            //dd($completo);
            $generales = new General;
            $generales->coding   =  $coding; 
            $generales->serv_id     =  $request['serv_id'];
            $generales->seccion     =  $request['seccion'];
            $generales->descripcion =  $completo;
            $generales->responsable =  $request['responsable'];
            $generales->user_id     =  Auth::user()->id;
            $generales->fecha       =  $date->toFormattedDateString();
            $generales->save();

            Session::flash('message','La solicitud de trabajo para mantenimiento general fue creada correctamente...!!!');
            return redirect()->action('Servicio\GeneralController@getMantegene');


        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 

        $general = General::find($id);
        $supervisor = User::where('type','Supervisor')->where('position','AUTOMOTORES')->first();
        $jefe  = User::where('type','Jefatura')->where('position','INFRAESTRUCTURA')->first();
        
        $view =  \View::make('servicios.carpinteria.pdf', compact('general','supervisor','jefe'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('carta', 'portrait');
        return $pdf->stream('Solicitud Carpinteria'.$general->id.'.pdf');
    
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
        $general = General::find($id);
        return view('servicios.carpinteria.edit', compact('solicitantes','general'));
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
        
        $generral = General::find($id);
        $generral->serv_id =  $request['serv_id'];
        $generral->descripcion =  $request['descripcion'];
        $generral->responsable =  $request['responsable'];
        $generral->user_id     =  Auth::user()->id; 
        $generral->fecha       =  $date->toFormattedDateString();
        $generral->save();

        //dd($request->seccion);
        if($request->seccion === "eléctrico") { 
            Session::flash('message','La solicitud de trabajo para los eléctricos fue editada correctamente...!!!');
            return redirect()->action('Servicio\GeneralController@getElectrico');
        } 

        if($request->seccion === "jardinería") {
            Session::flash('message','La solicitud de trabajo  para jardinería fue editada correctamente...!!!');
            return redirect()->action('Servicio\GeneralController@getJardineria');
        }

        if($request->seccion === "mecánico general") { 
            Session::flash('message','La solicitud de trabajo para el mecánico general fue editada correctamente...!!!');
            return redirect()->action('Servicio\GeneralController@getMegeneral');
        } 

        if($request->seccion === "albañilería") { 
            Session::flash('message','La solicitud de trabajo para el albañil fue editada correctamente...!!!');
            return redirect()->action('Servicio\GeneralController@getAlbanileria');
        } 

        if($request->seccion === "plomería") { 
            Session::flash('message','La solicitud de trabajo para plomería fue editada correctamente...!!!');
            return redirect()->action('Servicio\GeneralController@getPlomeria');
        } 

        if($request->seccion === "serv._general") { 
            Session::flash('message','La solicitud de trabajo para serv. general fue editada correctamente...!!!');
            return redirect()->action('Servicio\GeneralController@getSergene');
        } 

        if($request->seccion === "mant._general") { 
            Session::flash('message','La solicitud de trabajo para mantenimiento general fue editada correctamente...!!!');
            return redirect()->action('Servicio\GeneralController@getMantegene');
        } 

        Session::flash('message','La solicitud fue EDITADA correctamente...');
        return redirect('generales');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
     //   General::destroy($id);
       // Session::flash('message','La solicitud para el carpintero fue eliminada correctamente...');
         //return redirect('generales');
    }

    public function getElectrico()
    {
        $solicitantes = Servicio::all();
        $generales = General::where('seccion','eléctrico')->orderBy('created_at')->get();
        return view('servicios.electricidad.index',compact('solicitantes','generales'));
    }
    public function getJardineria()
    {
        $solicitantes = Servicio::all();
        $generales = General::where('seccion','jardinería')->orderBy('created_at')->get();
        return view('servicios.jardineria.index',compact('solicitantes','generales'));
    }
    public function getMegeneral()
    {
        $solicitantes = Servicio::all();
        $generales = General::where('seccion','mecánico general')->orderBy('created_at')->get();
        return view('servicios.megeneral.index',compact('solicitantes','generales'));
    }
    public function getAlbanileria()
    {
        $solicitantes = Servicio::all();
        $generales = General::where('seccion','albañilería')->orderBy('created_at')->get();
        return view('servicios.albanileria.index',compact('solicitantes','generales'));
    }
    public function getPlomeria()
    {
        $solicitantes = Servicio::all();
        $generales = General::where('seccion','plomería')->orderBy('created_at')->get();
        return view('servicios.plomeria.index',compact('solicitantes','generales'));
    }
    public function getSergene()
    {
        $solicitantes = Servicio::all();
        $generales = General::where('seccion','serv._general')->orderBy('created_at')->get();
        return view('servicios.sergeneral.index',compact('solicitantes','generales'));
    }
    public function getMantegene()
    {
        $solicitantes = Servicio::all();
        $generales = General::where('seccion','mant._general')->orderBy('created_at')->get();
        return view('servicios.mantegeneral.index',compact('solicitantes','generales'));
    }

}
