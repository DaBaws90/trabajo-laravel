<?php

use Faker\Generator as Faker;

$factory->define(escuelaempresa\Student::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstName,
        'lastname'=>$faker->lastName,
        'age'=>$faker->numberBetween($min = 16, $max = 50)
    ];
});
