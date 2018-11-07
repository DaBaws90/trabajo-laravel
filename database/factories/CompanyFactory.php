<?php

use Faker\Generator as Faker;

$factory->define(escuelaempresa\Company::class, function (Faker $faker) {
    return [
        'name'=>$faker->company,
        'city'=>$faker->city,
        'cp'=>$faker->postcode
    ];
});
