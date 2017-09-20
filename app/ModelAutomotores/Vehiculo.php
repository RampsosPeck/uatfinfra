<?php

namespace Uatfinfra;
use Uatfinfra\User;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
	protected $table = 'vehiculos';
	
	protected $fillable = ['type', 'placa','color','passengers','model','especification','mileage','brand','chassis','motor','cilindrada','combu','estado','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
