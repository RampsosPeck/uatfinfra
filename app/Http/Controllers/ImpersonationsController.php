<?php

namespace Uatfinfra\Http\Controllers;

use Illuminate\Http\Request;

class ImpersonationsController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function store()
    {
    	//return request('user_id');
    	
    	if(auth()->user()->canImpersonate())
    	{
    		//Guardamos el id del usuario
    		session(['impersonator_id' => auth()->id()]);

    		//cambiamos de usuario
    		auth()->loginUsingId( request('user_id') );

    		//retornamos al home con sus valores que le corresponden
    		return redirect('/home')->with('flash', 'Estas personificando al usuario con el id '. request('user_id') );	
    	}

    	return back()->with('flash','Acción no permitida');

    }

    public function destroy()
    {
    	auth()->loginUsingId( session('impersonator_id') );

    	//Olvidamos o eliminamos unua valiable de session 
    	
    	session()->forget('impersonator_id');

    	return back()->with('flash', 'Has vuelto a ser tú '. auth()->user()->name );
    }



}
