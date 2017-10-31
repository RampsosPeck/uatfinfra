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
        $reser->entidad = "La entidad";
		$reser->objectivo = "El objetivo";
		$reser->pasajeros= 5;
		$reser->dias      = 4;
		$reser->fecha_inicial= Carbon::now();
		$reser->fecha_final= Carbon::now();
		$reser->user_id    = 1;
		$reser->save();

    }
}
