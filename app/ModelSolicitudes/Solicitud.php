<?php

namespace Uatfinfra\ModelSolicitudes;
use Illuminate\Database\Eloquent\Model;
use Uatfinfra\ModelAutomotores\Vehiculo;
use Uatfinfra\User;

class Solicitud extends Model {
	protected $table = 'solicitudes';

	protected $fillable = ['vehiculo_id', 'user_id', 'descripcion', 'fecha'];

	public function vehiculo() //$viaje->vehiculo->placa
	{
		return $this->belongsTo(Vehiculo::class);
	}
	public function user() {
		return $this->belongsTo(User::class);
	}

	public function mecanicos() {
		return $this->hasMany('Uatfinfra\ModelMecanico\Mecanico');
	}
}
