<?php

namespace Uatfinfra\Http\Controllers;

use Uatfinfra\User;
use Illuminate\Http\Request;
use Uatfinfra\Http\Requests\UserSaveRequest;
use Session;
use Auth;
use Alert;
use Toastr;
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
    public function store(UserSaveRequest $request)
    {
        //return $request;


        if($request->get('password') === null ){
            $pass =  bcrypt($request->get('cedula'));  
        }else{
            $pass =  bcrypt($request->get('password'));
        }
         
        $user = new User;
        $user->name         = $request->get('name');
        $user->cedula       = $request->get('cedula');
        $user->celular      = $request->get('celular');
        $user->email        = $request->get('email');
        $user->password     = $pass;
        $user->active       = $request->get('active');
        $user->type         = $request->get('type');
        $user->position     = $request->get('position');
        $user->entidad      = $request->get('entidad');
        $user->insertador   = Auth::user()->id;
        $user->save();

        //Session::flash('message','Usuario creado correctamente');
        Alert::success('Usuario creado correctamente...!!!');

        Toastr::success('Usuario creado correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);

        return redirect('users');
        
        //return redirect('users')->with('flash', 'Añadiste al usuario correctamente!!!');

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
        //dd($id);
        $user = User::find($id);
        //dd($user);
        return view('automotives.admin.users.edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserSaveRequest $request, $id)
    {

        //Verificamos si el usuario esta modificando el password 
        if($request->get('password') === null )
        {
            //En el caso de que no mande ningun password se mantiene 
            $user = User::find($id);
            $user->name         = $request->get('name');
            $user->cedula       = $request->get('cedula');
            $user->celular      = $request->get('celular');
            $user->email        = $request->get('email');
            $user->type         = $request->get('type');
            $user->position     = $request->get('position');
            $user->entidad      = $request->get('entidad');
            $user->active       = $request->get('active');
            $user->insertador   = Auth::user()->id;
            $user->save();
        }else{
            //En el caso de que mande el password
            $user = User::find($id);
            $user->name         = $request->get('name');
            $user->cedula       = $request->get('cedula');
            $user->celular      = $request->get('celular');
            $user->email        = $request->get('email');
            $user->password     = bcrypt($request->get('password'));
            $user->type         = $request->get('type');
            $user->position     = $request->get('position');
            $user->entidad      = $request->get('entidad');
            $user->active       = $request->get('active');
            $user->insertador   = Auth::user()->id;
            $user->save();
        }

        //Session::flash('message','Usuario editado correctamente...');
        Alert::success('Usuario editado correctamente...!!!');

        Toastr::success('Usuario editado correctamente...!!!', $title = null, $options = ["positionClass"=> "toast-bottom-right", "progressBar"=> true, "timeOut"=> "9000"]);

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('info','Usuario eliminado correctamente...');
        return redirect('users');
    }
}
