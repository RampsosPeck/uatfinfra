<?php

namespace Uatfinfra\ModelServicios;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{

    protected $table = 'servicios';

	protected $fillable = ['id', 'solicitantes'];
 
}
