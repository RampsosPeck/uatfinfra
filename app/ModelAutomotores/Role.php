<?php

namespace Uatfinfra;
use Uatfinfra\User;
use Uatfinfra\Viaje;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'roles';
	
	protected $fillable = ['tipoa','tipob','tipoc','cantidad','viaje_id','user_id'];

	public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function viaje()
    {
        return $this->belongsTo(Viaje::class);
    }
  
}
