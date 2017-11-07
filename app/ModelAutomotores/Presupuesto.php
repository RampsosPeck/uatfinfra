<?php

namespace Uatfinfra\ModelAutomotores;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';
	
	protected $fillable = ['combustible',
							'totalcombu',
							'precio',
							'totalprecio',
							'canpeaje',
							'prepeaje',
							'totpeaje',
							'cangaraje',
							'pregaraje',
							'totgaraje',
							'nommante',
							'canmante',
							'premante',
							'totmante',
							'canviaciu',
							'previaciu',
							'totviaciu',
							'canviapro',
							'previapro',
							'totviapro',
							'canviafro',
							'previafro',
							'totviafro',
							'totprebol',
							'ruta1',
							'cantidad1',
							'precio1',
							'total1',
							'ruta2',
							'cantidad2',
							'precio2',
							'total2',
							'vueltas',
							'preciovuelta',
							'totalvuelta',
							'totalpublico',
							'totaldiferencia'];
}
