<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Illuminate\Http\Request;
use Uatfinfra\User;
use Uatfinfra\Reservation;
use Uatfinfra\Http\Controllers\Controller;

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
        //dd($reservations);
        return view('automotives.automotive.reservation.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('automotives.automotive.reservation.create', compact('users'));
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
        $reserva->objective = $request->get('objective');
        $reserva->passengers = $request->get('passengers');
        $reserva->days = 5;
        $reserva->startdate = $request->get('startdate');
        $reserva->enddate = $request->get('enddate');
        $reserva->user_id = $request->get('user_id');
        $reserva->save();

        return redirect('reservas')->with('flash', 'Tu reserva fue creada correctamente!!!');
        
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
