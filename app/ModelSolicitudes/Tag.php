<?php

namespace Uatfinfra\ModelSolicitudes;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

	protected $fillable = ['id', 'name'];
}
