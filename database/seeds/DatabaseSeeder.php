<?php

use Illuminate\Database\Seeder; 

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(UsersTableSeeder::class);
        $this->call(ReservationTableSeeder::class);
        $this->call(DestinoTableSeeder::class);
        $this->call(VehiculoTableSeeder::class);
        $this->call(TiposTableSeeder::class);
        $this->call(ServiciosTableSeeder::class);
        $this->call(CombustibleTableSeeder::class);

        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
    
}
