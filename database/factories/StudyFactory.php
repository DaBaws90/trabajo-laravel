<?php

use Faker\Generator as Faker;

$factory->define(escuelaempresa\Study::class, function (Faker $faker) {
    return [
        'id_student'=> escuelaempresa\Student::all()->random()->id,
        'id_grade'=>escuelaempresa\Grade::all()->random()->id,
    ];
});
