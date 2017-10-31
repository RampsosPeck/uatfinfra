<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Uatfinfra\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(Uatfinfra\ModelAutomotores\Destino::class, function (Faker $faker) {
    return [
        'dep_inicio' => $faker->randomElement(['Potosí','Oruro','La_paz','Pando','Cochabamba','Sucre','Tarija','Santa_cruz','Beni']),
        'origen'     => $faker->state, 
        'dep_final'  => $faker->randomElement(['Potosí','Oruro','La_paz','Pando','Cochabamba','Sucre','Tarija','Santa_cruz','Beni']),
        'destino'    => $faker->state,
        'ruta'       => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'kilometraje'=> $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 1000),
        'tiempo'     => $faker->time($format = 'H:i:s', $max = 'now')
    ];
});

$factory->define(Uatfinfra\ModelAutomotores\Vehiculo::class, function (Faker $faker) {
    return [
    	'tipo'       => $faker->userName,
        'placa'      => $faker->userName,
        'color'      => $faker->colorName,
        'pasajeros'  => $faker->numberBetween($min = 5, $max = 36),
    	'modelo'       => $faker->userName,
    	'marca'       => $faker->userName,
    	'kilometraje' => $faker->numberBetween($min = 5, $max = 36),

        'especificacion'       => $faker->randomElement(['Camión','Camioneta','Civilian','Jeep','Omnibus','Taxi','Vagoneta']),
        'estado'     => $faker->randomElement(['optimo','mantenimiento','desuso']),
    	'chasis'       => $faker->userName,
    	'motor'       => $faker->userName,
    	'cilindrada'       => $faker->userName,
    	'user_id'       => $faker->numberBetween($min = 1, $max = 3),
        
        
    ];
});