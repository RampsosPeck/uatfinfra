<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Uatfinfra\ModelAutomotores\Vehiculo;
use Uatfinfra\ModelAutomotores\Combustible;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\Http\Requests\VehiculoSaveRequest; 
use Uatfinfra\ModelAutomotores\Photo;
use Uatfinfra\User;
use Session;
use Auth;

use Alert;
use Toastr;
class VehiculoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::all();
    	return view('automotives.automotive.vehiculo.index',compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('type','Conductor')->get();
        $oils  = Combustible::all();
        return view('automotives.automotive.vehiculo.create', compact('users','oils'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehiculoSaveRequest $request)
    {
       //return $request;
        //Vehiculo::create($request->all());
        
        if($request->get('user_id') === null ){
            $user =  0;  
        }else{
            $user =  $request->get('user_id');
        }
        
        $vehiculo = new Vehiculo;
        $vehiculo->user_id = $user;
        $vehiculo->kilometraje = $request->get('kilometraje');
        $vehiculo->estado  = $request->get('estado');
        $vehiculo->placa   = $request->get('placa');
        $vehiculo->tipo    = $request->get('tipo');
        $vehiculo->especificacion = $request->get('especificacion');
        $vehiculo->cilindrada = $request->get('cilindrada');
        $vehiculo->modelo     = $request->get('modelo');
        $vehiculo->color      = $request->get('color');
        $vehiculo->pasajeros = $request->get('pasajeros');
        $vehiculo->chasis    = $request->get('chasis');
        $vehiculo->marca      = $request->get('marca');
        $vehiculo->motor      = $request->get('motor');
        $vehiculo->save();

        $vehiculo->combustibles()->attach($request->get('oil_id'));

        Photo::where('vehiculo_id', 10000)->update(['vehiculo_id' => $vehiculo->id]);
         
        //Session::flash('message','El vehículo se inserto correctamente...');
        Alert::success('El vehículo se inserto correctamente...!!!');

        Toastr::success('El vehículo se inserto correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
        return redirect('vehiculos');
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

        //dd($id);
        $users = User::where('type','Conductor')->get();
        $vehiculo = Vehiculo::find($id);
        $oils  = Combustible::all();
        $photos = Photo::where('vehiculo_id',$id)->get();
        //dd($photos);
        return view('automotives.automotive.vehiculo.edit',compact('vehiculo','users','oils','photos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehiculoSaveRequest $request, $id)
    {
        //return $request;

        if($request->get('user_id') === null ){
            $user =  0;  
        }else{
            $user =  $request->get('user_id');
        }

        $vehiculo  = Vehiculo::find($id);
        $vehiculo->user_id     = $user;
        $vehiculo->kilometraje = $request->get('kilometraje');
        $vehiculo->estado       = $request->get('estado');
        $vehiculo->placa        = $request->get('placa');
        $vehiculo->tipo         = $request->get('tipo');
        $vehiculo->especificacion = $request->get('especificacion');
        $vehiculo->cilindrada   = $request->get('cilindrada');
        $vehiculo->modelo       = $request->get('modelo');
        $vehiculo->color        = $request->get('color');
        $vehiculo->pasajeros    = $request->get('pasajeros');
        $vehiculo->chasis       = $request->get('chasis');
        $vehiculo->marca        = $request->get('marca');
        $vehiculo->motor        = $request->get('motor');
        $vehiculo->save();

        $vehiculo->combustibles()->sync($request->get('oil_id'));

        //Session::flash('message','El vehículo fue editado corréctamente!!!');
        Alert::info('El vehículo fue editado corréctamente...!!!');

        Toastr::success('El vehículo fue editado corréctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
        return redirect('vehiculos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehiculo::destroy($id);

        Photo::where('vehiculo_id', $id)->delete();

       // Session::flash('message','Vehículo eliminado correctamente...');
        Alert::error('Vehículo eliminado correctamente...!!!');

        Toastr::warning('Vehículo eliminado correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
        return redirect('vehiculos');
        
    }
}
