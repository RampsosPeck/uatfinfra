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
		$user->email= "peralta.jorge.uatf@uatf.com";
		$user->password= bcrypt('123456');
        $user->active = true;
        $user->type = "Administrator";
        $user->position = "WEB SITE";
        $user->entidad = "Ingeniería de Sistemas";
		$user->save();

        $user = new User;
        $user->name = "Ing. Roger Barahona Telchi";
        $user->cedula = "1058017";
        $user->celular= "72422484";
        $user->email= "barahonatelchiroger@gmail.com";
        $user->password= bcrypt('1234567');
        $user->active = true;
        $user->type = "Jefatura";
        $user->position = "INFRAESTRUCTURA";
        $user->entidad = "U. A. T. F.";
        $user->save();

        $user = new User;
        $user->name = "Ing. Alvaro Urgrinovich";
        $user->cedula = "7440900";
        $user->celular= "74409008";
        $user->email= "supervisor@uatf.com";
        $user->password= bcrypt('1234568');
        $user->active = true;
        $user->type = "Supervisor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Henry Soria Galvarro";
        $user->cedula = "1881308";
        $user->celular= "70466762";
        $user->email= "mensajero@uatf.com";
        $user->password= bcrypt('123456789');
        $user->active = true;
        $user->type = "Mensajero";
        $user->position = "INFRAESTRUCTURA";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Tec. Sup. Diego A. Condori M.";
        $user->cedula = "8526013";
        $user->celular= "68380147";
        $user->email= "mecanico@uatf.com";
        $user->password= bcrypt('123456');
        $user->active = true;
        $user->type = "Mecánico";
        $user->position = "INFRAESTRUCTURA";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Sr. Pastor Orcko Bravo";
        $user->cedula = "1390040";
        $user->celular= "73871063";
        $user->email= "conductor1@uatf.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Sr. Renato Loayza Garcia";
        $user->cedula = "628381";
        $user->celular= "71812602";
        $user->email= "conductor2@uatf.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Sr. Valerio Condori Arismendi";
        $user->cedula = "1277096";
        $user->celular= "72402867";
        $user->email= "conductor3@uatf.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Sr. Walter Mariscal Suarez";
        $user->cedula = "1280428";
        $user->celular= "67954627";
        $user->email= "conductor4@uatf.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Sr. Vicente Gary Carreón Cuba";
        $user->cedula = "3683027";
        $user->celular= "70464706";
        $user->email= "garycarreon2017@gmail.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Sr. Renato Mamani Ruiz";
        $user->cedula = "1409404";
        $user->celular= "73889632";
        $user->email= "conductor6@uatf.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Sr. Edgar Hermogenes Lazarte Veracruz";
        $user->cedula = "974267";
        $user->celular= "70451365";
        $user->email= "garylv_5@hotmail.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Sr. Alberto Encinas Escalante";
        $user->cedula = "3981849";
        $user->celular= "70472050";
        $user->email= "conductor8@uatf.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Sr. Florencio Flores Quispe";
        $user->cedula = "1368275";
        $user->celular= "73880135";
        $user->email= "conductor9@uatf.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Sr. Fidel Mamani Choque";
        $user->cedula = "3699845";
        $user->celular= "73881588";
        $user->email= "conductor10@uatf.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Sr. Juan Carlos Cruz Avillo";
        $user->cedula = "6601158";
        $user->celular= "73852870";
        $user->email= "carlitos_050@hotmail.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Sr. Misael Caceres Mostajo";
        $user->cedula = "5571288";
        $user->celular= "73895510";
        $user->email= "conductor12@uatf.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Sr. Julio Cesar Vargas Luna";
        $user->cedula = "5557316";
        $user->celular= "72430321";
        $user->email= "jhulios_oso_buho@hotmail.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Vicerrectorado";
        $user->save();

        $user = new User;
        $user->name = "Sr. Mario Nina Mendez";
        $user->cedula = "3711347";
        $user->celular= "76161814";
        $user->email= "conductor14@uatf.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Rectorado";
        $user->save();

        $user = new User;
        $user->name = "Sr. Alfredo Pinto Rosso";
        $user->cedula = "662279";
        $user->celular= "71839787";
        $user->email= "conductor15@uatf.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Depto. de Infraestructura";
        $user->save();

        $user = new User;
        $user->name = "Sr. Willy Cabrera Quintanilla";
        $user->cedula = "1393651";
        $user->celular= "72428861";
        $user->email= "conductor16@uatf.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Decanatura de Ciencias Agropecuarias";
        $user->save();

        $user = new User;
        $user->name = "Lic. Marco Sandival";
        $user->cedula = "11002255";
        $user->celular= "99663322";
        $user->email= "encargado@uatf.com";
        $user->password= bcrypt('123456');
        $user->active = true;
        $user->type = "Enc. de Viaje";
        $user->position = "U.A.T.F.";
        $user->entidad = "Ing. de Sistemas";
        $user->save();

        $user = new User;
        $user->name = "Lic. Liber Mendez Arrueta";
        $user->cedula = "11066255";
        $user->celular= "9977322";
        $user->email= "encargado1@uatf.com";
        $user->password= bcrypt('123456');
        $user->active = true;
        $user->type = "Enc. de Viaje";
        $user->position = "U.A.T.F.";
        $user->entidad = "Ing. de Sistemas";
        $user->save();
    }
}
