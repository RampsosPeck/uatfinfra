<?php

namespace Uatfinfra;
use Uatfinfra\User;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $table = 'viajes';
	
	protected $fillable = ['tipo','entidad','objectivo','dias','pasajeros','fecha_inicio','fecha_final','estado','reserva_id'];

	public function roles()
    {
        return $this->hasMany(Viaje::class);
    }

    public function reservations()
    {
        return $this->hasOne(Reservation::class);
    }

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }
}
