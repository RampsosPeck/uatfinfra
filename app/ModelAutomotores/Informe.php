<?php

namespace Uatfinfra\ModelAutomotores;

use Illuminate\Database\Eloquent\Model;
use Uatfinfra\User;


class Informe extends Model
{
    protected $table = 'informes';
    protected $guard_name = 'web';
    protected $fillable = ['viaje_id','vehiculo_id','conductor','fecha_inicial','fecha_final','horainicial','horafinal','fecha_inicial2','fecha_final2','horainicial2','horafinal2','fecha_inicial3','fecha_final3','horainicial3','horafinal3','fecha_inicial4','fecha_final4','horainicial4','horafinal4','fecha_inicial5','fecha_final5','horainicial5','horafinal5','dias','pasajeros','informe','recomendacion','kmpartida','kmllegada','kmtotal','viaticos','litro1','compra1','litro2','compra2','litro3','compra3','totallitro','totalbs','peaje','imprevisto','descripcion','debocombu','debopeaje','deboimprevi','debototal'];

   
    public function conductores()
    {
        return $this->belongsToMany(User::class);
    }

    public function vehiculo()//$viaje->vehiculo->placa
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function scopeAllowed($query)
    {
        if(auth()->user()->can('view', $this))
        {
            return $query;
        }
        return $query->where('conductor', auth()->id());
    }
   
}
