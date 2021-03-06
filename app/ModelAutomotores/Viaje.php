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
                            'fecha_inicial2',
                            'fecha_final2',
                            'horainicial2',
                            'horafinal2',
                            'fecha_inicial3',
                            'fecha_final3',
                            'horainicial3',
                            'horafinal3',
                            'fecha_inicial4',
                            'fecha_final4',
                            'horainicial4',
                            'horafinal4',
                            'fecha_inicial5',
                            'fecha_final5',
                            'horainicial5',
                            'horafinal5',
                            'nota',
                            'recurso',
                            'estado',
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
    public function encargado()//$viaje->encargado->name
    {
        return $this->belongsTo(User::class);
    }

    public function ruta()
    {
        return $this->hasOne(Ruta::class);
    }

    public function tipos()
    {
        return $this->belongsToMany(Tipo::class);
    }

}
