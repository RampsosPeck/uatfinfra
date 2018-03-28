<?php

namespace Uatfinfra\ModelMecanico;

use Illuminate\Database\Eloquent\Model;
use Uatfinfra\ModelSolicitudes\Solicitud;
class Pedido extends Model
{
    protected $table = 'pedidos';

	protected $fillable = ['sol_id', 'kilome', 'justificacion', 'idh', 'observacion', 'cant1', 'med1', 'cant2','med2','cant3','med3','cant4','med4','cant5','med5','cant6','med6','cant7','med7','cant8','med8','cant9','med9','cant10','med10','cant11','med11','des1','des2','des3','des4','des5','des6','des7','des8','des9','des10','des11','created_at','updated_at'];

	

}
