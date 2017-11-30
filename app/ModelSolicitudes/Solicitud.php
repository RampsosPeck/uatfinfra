<?php

namespace Uatfinfra\ModelSolicitudes;
use Uatfinfra\User;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';

    protected $fillable = ['vehiculo_id','user_id','descripcion','fecha'];

   
    public function vehiculo()//$viaje->vehiculo->placa
    {
        return $this->belongsTo(Vehiculo::class);
    }
	public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
