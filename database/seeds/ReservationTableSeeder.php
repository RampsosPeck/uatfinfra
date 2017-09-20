<?php
use Uatfinfra\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reser = new Reservation;
        $reser->entity = "La entidad";
		$reser->objective = "El objetivo";
		$reser->passengers= 5;
		$reser->days      = 4;
		$reser->dateoutput= Carbon::now();
		$reser->datearrival= Carbon::now();
		$reser->user_id    = 1;
		$reser->save();

    }
}
