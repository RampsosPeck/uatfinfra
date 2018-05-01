<?php

namespace Uatfinfra\ModelServicios;

use Illuminate\Database\Eloquent\Model;
use Uatfinfra\ModelServicios\Servicio;
use Uatfinfra\User;

class General extends Model
{
    protected $table = 'generales';

	protected $fillable = ['id', 'coding', 'serv_id', 'seccion','descripcion','user_id','fecha','responsable'];
  
    public function servicio()
    {
        return $this->hasOne('Uatfinfra\ModelServicios\Servicio','id','serv_id');
    }

    public function user() {
		return $this->belongsTo(User::class);
	}

}



