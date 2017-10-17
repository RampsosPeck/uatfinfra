<?php

namespace Uatfinfra\ModelAutomotores;
use Uatfinfra\User;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
	protected $guarded = [];
	protected $table = 'vehiculos';
	
	protected $fillable = ['tipo', 'placa','color','pasajeros','modelo','especificacion','kilometraje','marca','chasis','motor','cilindrada','estado','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function combustibles()
    {
        return $this->belongsToMany(Combustible::class);

    }
    
}
