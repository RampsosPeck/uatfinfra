<?php

namespace Uatfinfra\ModelAutomotores;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{

    protected $table = 'destinos';

    protected $fillable = ['origen','dep_inicio','dep_final','destino','kilometraje','tiempo','ruta','antes'];

    public function viajedestinos()
    {				
    	$this->belongsToMany(Viaje::class);
    }

}



