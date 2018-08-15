<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Illuminate\Http\Request;
use Uatfinfra\ModelAutomotores\Destino;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Uatfinfra\ModelAutomotores\Tipo;
use Uatfinfra\User;
use Uatfinfra\Reservation;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\Http\Requests\ReserSaveRequest;
use Session;
use Auth;
use Alert;
use Toastr;
use Redirect;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        $users = User::where('type','Enc. de Viaje')->where('position','U.A.T.F.')->get();
        return view('automotives.automotive.reservation.index',compact('reservations','users'));
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
    public function store(ReserSaveRequest $request)
    {
        //return $request;
        //Reservation::create($request->all());
 
        $a = strtotime($request['startdate']);
        $b = strtotime($request['enddate']);
        if($a > $b)
        {
            Alert::error('La fecha final no debe ser mayor a la inicial...!!!');   
            Toastr::error('No se creó la reserva de viaje correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
            return Redirect::to('/calendario/create');          
        }else{

            $fi = $request->get('enddate');
            $fi = $fi.' 23:59:59';
            
            $reserva = new Reservation;
            $reserva->entity = $request->get('entity');
            $reserva->objetive = $request->get('objetive');
            $reserva->passengers = $request->get('passengers');
            $reserva->startdate = $request->get('startdate');
            $reserva->enddate = $fi;
            $reserva->user_id = $request->get('user_id');
            $reserva->save();

            //Session::flash('message','La reserva fue CREADA correctamente...');
            Alert::success('La reserva de viaje fue CREADA correctamente...!!!');

            Toastr::success('La reserva fue CREADA correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
            return redirect('reservas');

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
        //return Reservation::find($id);
        $reservas = Reservation::find($id); 

        $vehiculos  = Vehiculo::all();
        $destinos   = Destino::all();
        $encargados = User::where('type','Enc. de Viaje')->where('active',true)->get();
        $conductores= User::where('type','Conductor')->where('active',true)->get();

         $categorias = Tipo::all();

        return view('automotives.automotive.reservation.concretar', compact('vehiculos','destinos','encargados','conductores','reservas','categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservas =  Reservation::find($id);
        $users = User::where('type','Enc. de Viaje')->where('position','U.A.T.F.')->get();
        return view('automotives.automotive.reservation.edit',compact('reservas','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReserSaveRequest $request, $id)
    {
        //return $request;
        $reserva = Reservation::find($id);
        $reserva->fill($request->all());
        $reserva->save();

        //Session::flash('message','La reserva fue EDITADA correctamente...');
         Alert::info('La reserva fue EDITADA correctamente...!!!');

        Toastr::success('La reserva fue EDITADA correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);

        return redirect('reservas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reservation::destroy($id);
        
        //Session::flash('message','La reserva de viaje Eliminada correctamente...');
        Alert::error('La reserva de viaje Eliminada correctamente...!!!');

        Toastr::warning('La reserva de viaje Eliminada correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
        return redirect('reservas');
    }
}
