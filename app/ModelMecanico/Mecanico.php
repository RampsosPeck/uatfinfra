<?php

namespace Uatfinfra\ModelMecanico;

use Illuminate\Database\Eloquent\Model;

class Mecanico extends Model {

	protected $table = 'mecanicos';

	protected $fillable = ['sol_id', 'kilome', 'fecha', 'cantidad', 'nombre', 'descripcion', 'marca', 'codigo', 'observacion'];

	public function solicitud() {
		return $this->belongsTo('Uatfinfra\ModelSolicitudes\Solicitud');
	}
}
