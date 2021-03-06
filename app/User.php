<?php

namespace Uatfinfra;

use Auth;
use Uatfinfra\ActivationToken;
use Uatfinfra\ModelAutomotores\Reservation;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Uatfinfra\ModelAutomotores\Viaje;
use Uatfinfra\ModelAutomotores\Role;
use Uatfinfra\Notifications\ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    
    'name','cedula','celular','email','password','active','type','position','entidad','insertador'

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

    public function roless()
    {
        return $this->hasMany(Role::class);
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
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function profiles()
    {
        return $this->hasMany(SocialProfile::class);
    }

    public function getAvatarAttribute()
    {
        return optional($this->profiles->last())->avatar ?? url('dashboard/img/user.png');
    }

    public function scopeAllowed($query)
    {
        if(auth()->user()->can('view', $this))
        {
            return $query;
        }
        return $query->where('id', auth()->id());
    }

    public function getRoleDisplayNames()
    {
        return $this->roles->pluck('display_name')->implode(', ');
    }

}
