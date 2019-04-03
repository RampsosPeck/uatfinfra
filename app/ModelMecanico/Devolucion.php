<?php

namespace Uatfinfra\ModelMecanico;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    protected $table = 'devoluciones';

	protected $fillable = ['seccion','sol_id', 'serial', 'fecha', 'cantidad', 'nombre', 'detalle'];


}
