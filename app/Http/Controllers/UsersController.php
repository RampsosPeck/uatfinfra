<?php

namespace Uatfinfra\Http\Controllers;

use Uatfinfra\User;
use Illuminate\Http\Request;
use Uatfinfra\Http\Requests\UserSaveRequest;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        //$users = User::all();
    	$users = User::allowed()->get();
    	return view('automotives.admin.users.index',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //return view('automotives.admin.users.create');
        $user = new User;

        $this->authorize('create',$user);
        
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name','id');
        return view('automotives.admin.users.create',compact('user','roles','permissions'));

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
        $this->authorize('create', new User);

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

        //Asignamos los roles
        if($request->filled('roles'))//Si el usuario lleno el campo roles
        {
            $user->assignRole($request->roles);
        }
            
        //Asignamos los permisos
        if($request->filled('permissions'))//Si el usuario lleno el campo ermissions
        {
            $user->givePermissionTo($request->permissions);
        }
        
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
    public function show(User $user)
    {
        $this->authorize('view',$user);
        //dd($user);
        return view('automotives.admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update',$user);
        //dd($id);
        //$user = User::find($id);
         
        //$roles = Role::pluck('name','id');
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name','id');
        return view('automotives.admin.users.edit',compact('user','roles','permissions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserSaveRequest $request, User $user)
    {

        $this->authorize('update',$user);

        //Verificamos si el usuario esta modificando el password 
        if($request->get('password') === null )
        {
            //En el caso de que no mande ningun password se mantiene 
            $user = User::find($user->id);
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
            $user = User::find($user->id);
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
    public function destroy(User $user)
    {
        $this->authorize('delete',$user);

        User::destroy($user->id);
        Session::flash('info','Usuario eliminado correctamente...');
        return redirect('users');
    }
}
