<?php

use Illuminate\Database\Seeder;

class VehiculoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Uatfinfra\ModelAutomotores\Vehiculo::class, 30)->create();
    }
}
