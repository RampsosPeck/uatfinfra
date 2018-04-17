<?php

namespace Uatfinfra\ModelServicios;

use Illuminate\Database\Eloquent\Model;
use Uatfinfra\ModelServicios\Servicio;
use Uatfinfra\User;

class Carpinteria extends Model
{
    protected $table = 'carpinterias';

	protected $fillable = ['id', 'codi_carp', 'serv_id', 'descripcion','user_id','fecha','responsable'];
  
    public function servicio()
    {
        return $this->hasOne('Uatfinfra\ModelServicios\Servicio','id','serv_id');
    }

    public function user() {
		return $this->belongsTo(User::class);
	}

}



