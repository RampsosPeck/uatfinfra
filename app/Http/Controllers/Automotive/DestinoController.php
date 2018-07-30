<?php

namespace Uatfinfra\Http\Controllers\Automotive;

use Uatfinfra\ModelAutomotores\Destino;
use Illuminate\Http\Request;
use Uatfinfra\Http\Controllers\Controller;
use Uatfinfra\Http\Requests\DestinoSaveRequest;
use Session;
use Auth;
use Alert;
use Toastr;
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
    public function store(DestinoSaveRequest $request)
    {
        //return $request;

        Destino::create($request->all());
        
        //Session::flash('message','El destino se inserto correctamente...');
        Alert::success('El destino se inserto correctamente...!!!');

        Toastr::success('El destino se inserto correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
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
    public function update(DestinoSaveRequest $request, $id)
    {
        $destino = Destino::find($id);
        $destino->update($request->all());
        $destino->save();  
        //Session::flash('message','El destino fue ACTUALIZADO correctamente...');
        Alert::info('El destino fue ACTUALIZADO correctamente...!!!');

        Toastr::info('El destino fue ACTUALIZADO correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);
        return redirect('destinos'); 
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
