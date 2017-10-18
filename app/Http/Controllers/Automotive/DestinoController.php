<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Uatfinfra\ModelAutomotores\Destino;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Session;
use Auth;

class DestinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinos = Destino::all();
        return view('automotives.automotive.destinos.index',compact('destinos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('automotives.automotive.destinos.create');
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
        $this->validate($request,[
           'origen'    => 'required|string|min:4',
           'dep_inicio'=> 'required',
           'destino'   => 'required|string|min:4',
           'dep_final' => 'required',
           'kilometraje'=> 'required|integer'
        ]);

        Destino::create($request->all());
        
        Session::flash('message','El destino se inserto correctamente...');
        return redirect('destinos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Uatfinfra\Destino  $destino
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Uatfinfra\Destino  $destino
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destinos = Destino::find($id);
        return view('automotives.automotive.destinos.edit',compact('destinos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Uatfinfra\Destino  $destino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Uatfinfra\Destino  $destino
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
