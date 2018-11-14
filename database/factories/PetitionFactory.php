<?php

use Faker\Generator as Faker;

$factory->define(escuelaempresa\Petition::class, function (Faker $faker) {
    return [
        'type'=>$faker->randomElement($array = array ('DUAL', 'FCT', "Empleo"))
    ];
});
