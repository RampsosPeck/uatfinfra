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
        
        $reserva = new Reservation;
        $reserva->entity = $request->get('entity');
        $reserva->objetive = $request->get('objetive');
        $reserva->passengers = $request->get('passengers');
        $reserva->startdate = $request->get('startdate');
        $reserva->enddate = $request->get('enddate');
        $reserva->user_id = $request->get('user_id');
        $reserva->save();

        Session::flash('message','La reserva fue CREADA correctamente...');
        return redirect('reservas');
        
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
        Session::flash('message','La reserva fue EDITADA correctamente...');
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
        Session::flash('message','La reserva de viaje Eliminada correctamente...');
        return redirect('reservas');
    }
}
