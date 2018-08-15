<?php

use Uatfinfra\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{     
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Role::truncate();
        User::truncate();*/

        $adminRole = Role::create(['name'=>'Administrator', 'display_name' => 'Administrador']); 
        $jefeRole = Role::create(['name'=>'Jefatura', 'display_name' => 'Jefe de Infraestructura']); 
        $superviRole = Role::create(['name'=>'Supervisor', 'display_name' => 'Supervisor Encargado']); 
        $mensajeroRole = Role::create(['name'=>'Mensajero', 'display_name' => 'Mensajero de Infraestructura']); 
        $mecanicoRole = Role::create(['name'=>'Mecánico', 'display_name' => 'Mecánico de Buses']); 
        $conducRole = Role::create(['name'=>'Conductor', 'display_name' => 'Chofer']); 
        $encarRole = Role::create(['name'=>'Encargado', 'display_name' => 'Encargado de Viaje']);

        $viewUsersPermission = Permission::create([
            'name'=>'View Users', 'display_name' => 'Ver Usuarios']);
        $createUsersPermission = Permission::create([
            'name'=>'Create Users', 'display_name' => 'Crear Usuarios']);
        $updateUsersPermission = Permission::create([
            'name'=>'Update Users', 'display_name' => 'Actualizar Usuarios']);
        $deleteUsersPermission = Permission::create([
            'name'=>'Delete Users', 'display_name' => 'Eliminar Usuarios']);

        $viewInfoPermission = Permission::create([
            'name'=>'View Informes', 'display_name' => 'Ver Informes']);
        $createInfoPermission = Permission::create([
            'name'=>'Create Informes', 'display_name' => 'Crear Informes']);
        $updateInfoPermission = Permission::create([
            'name'=>'Update Informes', 'display_name' => 'Actualizar Informes']);
        $deleteInfoPermission = Permission::create([
            'name'=>'Delete Informes', 'display_name' => 'Eliminar Informes']);

        $viewRolePermission = Permission::create([
            'name'=>'View Roles', 'display_name' => 'Ver Roles']);
        $createRolePermission = Permission::create([
            'name'=>'Create Roles', 'display_name' => 'Crear Roles']);
        $updateRolePermission = Permission::create([
            'name'=>'Update Roles', 'display_name' => 'Actualizar Roles']);
        $deleteRolePermission = Permission::create([
            'name'=>'Delete Roles', 'display_name' => 'Eliminar Roles']);

        $viewPermissionPermissions = Permission::create([
            'name'=>'View Permissions', 'display_name' => 'Ver Permisos']);
        $updatePermissionPermissions = Permission::create([
            'name'=>'Update Permissions', 'display_name' => 'Actualizar Permisos']); 

        $admin = new User;
        $admin->name = "Ing. Jorge Denys Peralta Mamani";
        $admin->cedula = "12345678";
        $admin->celular= "75729198";
		$admin->email= "peralta.jorge.uatf@gmail.com";
		$admin->password= bcrypt('123456');
        $admin->active = true;
        $admin->type = "Administrator";
        $admin->position = "WEB SITE";
        $admin->entidad = "Ingeniero de Sistemas";
		$admin->save();

        $admin->assignRole($adminRole);

        $jefe = new User;
        $jefe->name = "Ing. Roger Barahona Telchi";
        $jefe->cedula = "1058017";
        $jefe->celular= "72422484";
        $jefe->email= "barahonatelchiroger@gmail.com";
        $jefe->password= bcrypt('1234567');
        $jefe->active = true;
        $jefe->type = "Jefatura";
        $jefe->position = "INFRAESTRUCTURA";
        $jefe->entidad = "U. A. T. F.";
        $jefe->save();

        $jefe->assignRole($jefeRole);

        $supervi = new User;
        $supervi->name = "Ing. Alvaro Urgrinovich";
        $supervi->cedula = "7440900";
        $supervi->celular= "74409008";
        $supervi->email= "supervisor@uatf.com";
        $supervi->password= bcrypt('1234568');
        $supervi->active = true;
        $supervi->type = "Supervisor";
        $supervi->position = "AUTOMOTORES";
        $supervi->entidad = "Depto. de Infraestructura";
        $supervi->save();

        $supervi->assignRole($superviRole);

        $mens = new User;
        $mens->name = "Henry Soria Galvarro";
        $mens->cedula = "1881308";
        $mens->celular= "70466762";
        $mens->email= "mensajero@uatf.com";
        $mens->password= bcrypt('123456789');
        $mens->active = true;
        $mens->type = "Mensajero";
        $mens->position = "INFRAESTRUCTURA";
        $mens->entidad = "Depto. de Infraestructura";
        $mens->save();

        $mens->assignRole($mensajeroRole);

        $mec = new User;
        $mec->name = "Tec. Sup. Diego A. Condori M.";
        $mec->cedula = "8526013";
        $mec->celular= "68380147";
        $mec->email= "mecanico@uatf.com";
        $mec->password= bcrypt('123456');
        $mec->active = true;
        $mec->type = "Mecánico";
        $mec->position = "INFRAESTRUCTURA";
        $mec->entidad = "Depto. de Infraestructura";
        $mec->save();

        $mec->assignRole($mecanicoRole);

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
        $user->grade = 1;
        $user->save();

        $user->assignRole($conducRole);

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
        $user->grade = 2;
        $user->save();

        $user->assignRole($conducRole);

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
        $user->grade = 3;
        $user->save();

        $user->assignRole($conducRole);

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
        $user->grade = 4;
        $user->save();

        $user->assignRole($conducRole);

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
        $user->grade = 5;
        $user->save();

        $user->assignRole($conducRole);

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
        $user->grade = 6;
        $user->save();

        $user->assignRole($conducRole);

        $user = new User;
        $user->name = "Sr. Edgar Hermogenes Lazarte V.";
        $user->cedula = "974267";
        $user->celular= "70451365";
        $user->email= "garylv_5@hotmail.com";
        $user->password= bcrypt('12345');
        $user->active = true;
        $user->type = "Conductor";
        $user->position = "AUTOMOTORES";
        $user->entidad = "Depto. de Infraestructura";
        $user->grade = 7;
        $user->save();

        $user->assignRole($conducRole);

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
        $user->grade = 8;
        $user->save();

        $user->assignRole($conducRole);

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
        $user->grade = 9;
        $user->save();

        $user->assignRole($conducRole);

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
        $user->grade = 10;
        $user->save();

        $user->assignRole($conducRole);

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
        $user->grade = 11;
        $user->save();

        $user->assignRole($conducRole);

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
        $user->grade = 12;
        $user->save();

        $user->assignRole($conducRole);

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
        $user->grade = 13;
        $user->save();

        $user->assignRole($conducRole);

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
        $user->grade = 14;
        $user->save();

        $user->assignRole($conducRole);

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
        $user->grade = 15;
        $user->save();

        $user->assignRole($conducRole);

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
        $user->grade = 16;
        $user->save();

        $user->assignRole($conducRole);

        $encar = new User;
        $encar->name = "Lic. Marco Sandival";
        $encar->cedula = "11002255";
        $encar->celular= "99663322";
        $encar->email= "encargado@uatf.com";
        $encar->password= bcrypt('123456');
        $encar->active = true;
        $encar->type = "Enc. de Viaje";
        $encar->position = "U.A.T.F.";
        $encar->entidad = "Ing. de Sistemas";
        $encar->save();

        $encar->assignRole($encarRole);

        $encarg = new User;
        $encarg->name = "Lic. Liber Mendez Arrueta";
        $encarg->cedula = "11066255";
        $encarg->celular= "9977322";
        $encarg->email= "encargado1@uatf.com";
        $encarg->password= bcrypt('123456');
        $encarg->active = true;
        $encarg->type = "Enc. de Viaje";
        $encarg->position = "U.A.T.F.";
        $encarg->entidad = "Ing. de Sistemas";
        $encarg->save();

        $encarg->assignRole($encarRole);

    }
}
