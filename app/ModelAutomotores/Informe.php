<?php

namespace Uatfinfra\ModelAutomotores;

use Illuminate\Database\Eloquent\Model;


class Informe extends Model
{
    protected $table = 'informes';

    protected $fillable = ['litro1','compra1','litro2','compra2','litro3','compra3','totallitro','totalbs','peaje','imprevisto','descripcion','debocombu','debopeaje','deboimprevi','debototal','viaticos','kmpartida','kmllegada','informe','recomendacion','pasajeros','dias','fecha_inicial','fecha_final','horainicial','horafinal','user_id','vehiculo_id','viaje_id'];
}
