<?php

namespace Uatfinfra\ModelAutomotores;

use Illuminate\Database\Eloquent\Model;

class PermiViaje extends Model
{
    protected $table = 'permiviajes';

    protected $fillable = ['user_id','motivo','fecha','dias','tipo'];

   
    public function conductores()
    {
        return $this->belongsToMany(User::class);
    }
}
