<?php

namespace Uatfinfra\ModelAutomotores;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
	protected $table = 'tipos';

	protected $fillable = ['id','nombre','created_at','updated_at'];

 
}
