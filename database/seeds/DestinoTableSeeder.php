<?php

use Illuminate\Database\Seeder;

class DestinoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Uatfinfra\ModelAutomotores\Destino::class, 30)->create();
    }
}
