<?php

namespace Uatfinfra\Http\Controllers;

use Uatfinfra\User;
use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    public function index()
    {
    	$users = User::all();
    	return view('automotives.admin.users.index',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('automotives.admin.users.create');
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

        $this->validate($request, [
            'name'   => 'required|string|min:4|max:100',
            'entidad'=> 'required|string|min:4|max:100',
            'password'=> 'required|string|min:5'
        ]);


        $user = new User;
        $user->name = $request->get('name');
        $user->cedula = $request->get('cedula');
        $user->celular = $request->get('celular');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->active = true;
        $user->type = 
        $user->position = 
        $user->entidad = $request->get('entidad');
        $user->insertador = Auth::user()->id;
        $user->save();

        return redirect('users')->with('flash', 'Añadiste al usuario correctamente!!!');

        /* Session::flash('message','Usuario creado correctamente');
        return redirect('users'); */

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
        dd($id);
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
