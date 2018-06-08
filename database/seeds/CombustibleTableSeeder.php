<?php

use Uatfinfra\ModelAutomotores\Combustible;
use Illuminate\Database\Seeder;

class CombustibleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $combus = new Combustible;
        $combus->name = "Diesel";
		$combus->save();

		$combus = new Combustible;
        $combus->name = "Gasolina";
		$combus->save();

		$combus = new Combustible;
        $combus->name = "GNV";
		$combus->save();

    }
}
