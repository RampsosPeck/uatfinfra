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
        $user->name = "Ing. Jorge Denys Peralta Mamani";
        $user->cedula = "12345678";
        $user->celular= "75729198";
		$user->email= "administrator@uatf.com";
		$user->password= bcrypt('123456');
        $user->active = true;
        $user->type = "Administrator";
        $user->position = "WEB SITE";
        $user->entidad = "Ingeniería de Sistemas";
		$user->save();

        $user = new User;
        $user->name = "Ph. D. Ing. Percy Oscar Gutierrez Gomez";
        $user->cedula = "3710060";
        $user->celular= "76163195";
        $user->email= "jefatura@uatf.com";
        $user->password= bcrypt('123456');
        $user->active = true;
        $user->type = "Jefatura";
        $user->position = "DEP. DE INFRAESTRUCTURA";
        $user->entidad = "U. A. T. F.";
        $user->save();

        $user = new User;
        $user->name = "Cr. Gral. Edgar Arce Pecho";
        $user->cedula = "3711104";
        $user->celular= "73850137";
        $user->email= "supervisor@uatf.com";
        $user->password= bcrypt('123456');
        $user->active = true;
        $user->type = "Supervisor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Dep. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Julio Cesar Vargas Luna";
        $user->cedula = "5557316";
        $user->celular= "72430321";
        $user->email= "conductor@uatf.com";
        $user->password= bcrypt('123456');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Dep. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Tec. Sup. Diego A. Condori M.";
        $user->cedula = "8526013";
        $user->celular= "68380147";
        $user->email= "mecanico@uatf.com";
        $user->password= bcrypt('123456');
        $user->active = true;
        $user->type = "Mecánico";
        $user->position = "WEB SITE";
        $user->entidad = "Dep. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Henry Soria Galvarro";
        $user->cedula = "1881308";
        $user->celular= "70466762";
        $user->email= "mensajero@uatf.com";
        $user->password= bcrypt('123456');
        $user->active = true;
        $user->type = "Mensajero";
        $user->position = "DEP. DE INFRAESTRUCTURA";
        $user->entidad = "Dep. de Infraestructura";
        $user->save();
    }
}
