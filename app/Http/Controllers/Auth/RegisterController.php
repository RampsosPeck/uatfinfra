<?php

namespace Uatfinfra\Http\Controllers\Auth;

use Uatfinfra\User;
use Uatfinfra\ActivationToken;
use Uatfinfra\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|min:4|max:50',
            'entidad'=>'required|string|min:4|max:50',
            'email' => 'required|string|email|max:50|unique:users',
            'cedula'=> 'required|string|min:6|max:12|unique:users',
            'celular'=> 'required|digits:8|unique:users',
            'password' => 'required|string|min:5|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Uatfinfra\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'entidad' => $data['entidad'],
            'email' => $data['email'],
            'cedula' => $data['cedula'],
            'celular' => $data['celular'],
            'password' => bcrypt($data['password']),
            'type' => 'Default',
        ])->generateToken();

        //ActivationToken::create([
        //    'user_id' => $user->id,
        //    'token'   => str_random(60)
        //]);
        

        //return $user;

    }
    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();

        return redirect('login')->withInfo('Te hemos enviado un link de activación a tu correo. Ingresa a tu correo electrónico y revice el email donde estará el link de activación!!!');
    }
}
