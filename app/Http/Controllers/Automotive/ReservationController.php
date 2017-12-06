<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Illuminate\Http\Request;
use Uatfinfra\User;
use Uatfinfra\Reservation;
use Uatfinfra\Http\Controllers\Controller;
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
    public function store(Request $request)
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
        return Reservation::find($id);
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
