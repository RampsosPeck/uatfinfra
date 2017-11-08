<?php

namespace Uatfinfra\ModelAutomotores;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
		protected $table = 'rutas';
	
		protected $fillable = ['destino1',
								'kilo1',
								'destino2',
								'kilo2',
								'destino3',
								'kilo3',
								'destino4',
								'kilo4',
								'destino5',
								'kilo5',
								'destino6',
								'kilo6',
								'adicional',
								'totalkm',
								'viaje_id'];

		public function viaje()
	    {
	        return $this->belongsTo(Ruta::class);
	    }

								
}
