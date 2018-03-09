<?php

namespace Uatfinfra\Http\Controllers\Mecanico;

use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Uatfinfra\ModelMecanico\Mecanico;
use Uatfinfra\ModelSolicitudes\Solicitud;
use Uatfinfra\User;

class MecanicoController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$solicitudes = Solicitud::all();
		$vehiculos = Vehiculo::all();
		return view('mecanicos.index', compact('solicitudes', 'vehiculos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$meca_id = \DB::table('mecanicos')->insertGetId([
			'sol_id' => $request['sol_id'],
			'kilome' => $request['kilome'],
			'fecha' => $request['fecha'],
			'cantidad' => $request['cantidad'],
			'nombre' => $request['nombre'],
			'descripcion' => $request['descripcion'],
			'marca' => $request['marca'],
			'codigo' => $request['codigo'],
			'observacion' => $request['observacion'],
		]);

		$mecanico = Mecanico::find($meca_id);

		$mecanicos = Mecanico::where('id', $mecanico->sol_id)->get();
		//dd($mecanicos);

		$solicitud = Solicitud::find($mecanico->sol_id);
		$user = User::find($solicitud->user_id);
		$vehiculo = Vehiculo::find($solicitud->vehiculo_id);

		return view('mecanicos.create', compact('solicitud', 'user', 'vehiculo', 'mecanicos'));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \Uatfinfra\ModelMecanico\Mecanico  $mecanico
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$solicitud = Solicitud::find($id);
		$user = User::find($solicitud->user_id);
		$vehiculo = Vehiculo::find($solicitud->vehiculo_id);
		//dd($solicitud);
		return view('mecanicos.create', compact('solicitud', 'user', 'vehiculo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \Uatfinfra\ModelMecanico\Mecanico  $mecanico
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Mecanico $mecanico) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Uatfinfra\ModelMecanico\Mecanico  $mecanico
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Mecanico $mecanico) {
		dd($request);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \Uatfinfra\ModelMecanico\Mecanico  $mecanico
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Mecanico $mecanico) {
		//
	}
}
