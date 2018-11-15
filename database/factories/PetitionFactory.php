<?php

use Faker\Generator as Faker;

$factory->define(escuelaempresa\Petition::class, function (Faker $faker) {
    return [
        'id_grade'=> escuelaempresa\Grade::all()->random()->id,
        'id_company'=> escuelaempresa\Company::all()->random()->id,
        'type'=>$faker->randomElement($array = array ('DUAL', 'FCT', "Empleo")),
        'n_students'=>$faker->numberBetween($min = 0, $max = 8)
    ];
});
