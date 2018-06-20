<?php
use Uatfinfra\ModelAutomotores\Tipo;
use Illuminate\Database\Seeder;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new Tipo;
        $tipo->nombre = "Ciudad";
		$tipo->save();

		$tipo = new Tipo;
        $tipo->nombre = "Sub. Sede";
		$tipo->save();

		$tipo = new Tipo;
        $tipo->nombre = "Provincia";
		$tipo->save();

		$tipo = new Tipo;
        $tipo->nombre = "Apoyo";
		$tipo->save();
 
    }
}
