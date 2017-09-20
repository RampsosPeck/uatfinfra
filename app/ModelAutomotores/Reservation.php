<?php

namespace Uatfinfra;
use Uatfinfra\User;
use Uatfinfra\ModelAutomotores\Viaje;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $date = [];

    protected $table = 'reservations';

    protected $fillable = ['entity','objective','passengers','days','startdate','enddate','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function viaje()
    {
        return $this->belongsTo(Viaje::class);
    }
}
