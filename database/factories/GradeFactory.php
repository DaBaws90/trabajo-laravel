<?php

use Faker\Generator as Faker;

$factory->define(escuelaempresa\Grade::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'level'=>$faker->numberBetween($min = 1, $max = 2) 
    ];
});
