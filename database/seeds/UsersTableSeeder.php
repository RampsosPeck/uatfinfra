<?php

use Uatfinfra\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{     
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Jorge Peralta";
		$user->email= "jorge@uatf.com";
		$user->password= bcrypt('123456');
		$user->save();
    }
}
