<?php

namespace Uatfinfra;

use Auth;
use Uatfinfra\ActivationToken;
use Uatfinfra\ModelAutomotores\Reservation;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Uatfinfra\ModelAutomotores\Viaje;
use Uatfinfra\ModelAutomotores\Role;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    
    'name','cedula','celular','email','password','active','tipo','cargo','entidad','insertador'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function viajes()
    {
        return $this->belongsToMany(Viaje::class);
    }


    //Con esta funcion aseguramos que solo algunos usuarios pueden impersonar
    public function canImpersonate($userId = null)
    {
        //si el usuario es administrador que retorne true o falce
        
        return $this->name === "Ing. Jorge Denys Peralta Mamani" && $this->id !== $userId;
        
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');

        $credentials['active'] = true;

        return $credentials;
    }

    public function generateToken()
    {
        $this->token()->create([
            'token'   => str_random(60)
        ]);

        return $this;
    }

    public function activate()
    {
        $this->update(['active' => true]);

        Auth::login($this);

        $this->token->delete();
    }

    public function token()
    {
        return $this->hasOne(ActivationToken::class);
    }


}
