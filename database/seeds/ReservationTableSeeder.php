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
		$reser->objetive = "El objetivo";
		$reser->passengers= 5;
		$reser->startdate= Carbon::now();
		$reser->enddate= Carbon::now();
		$reser->user_id    = 1;
		$reser->save();

    }
}
