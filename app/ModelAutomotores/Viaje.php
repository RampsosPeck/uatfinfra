<?php

namespace Uatfinfra\ModelAutomotores;
use Uatfinfra\User;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $table = 'viajes';
	
	protected $fillable = ['tipo',
                            'entidad',
                            'dias',
                            'pasajeros',
                            'fecha_inicial',
                            'fecha_final',
                            'horainicial',
                            'horafinal',
                            'categoria',
                            'nota',
                            'recurso',
                            'vehiculo_id',
                            'reserva_id'];

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
    public function vehiculo()//$viaje->vehiculo->placa
    {
        return $this->belongsTo(Vehiculo::class);
    }
    public function conductores()
    {
        return $this->belongsToMany(User::class);
    }
}




