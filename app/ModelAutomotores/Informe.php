<?php

namespace Uatfinfra\ModelAutomotores;

use Illuminate\Database\Eloquent\Model;
use Uatfinfra\User;


class Informe extends Model
{
    protected $table = 'informes';

    protected $fillable = ['viaje_id','vehiculo_id','conductor','fecha_inicial','fecha_final','horainicial','horafinal','dias','pasajeros','informe','recomendacion','kmpartida','kmllegada','kmtotal','viaticos','litro1','compra1','litro2','compra2','litro3','compra3','totallitro','totalbs','peaje','imprevisto','descripcion','debocombu','debopeaje','deboimprevi','debototal'];

   
    public function conductores()
    {
        return $this->belongsToMany(User::class);
    }

    public function vehiculo()//$viaje->vehiculo->placa
    {
        return $this->belongsTo(Vehiculo::class);
    }

   
}
