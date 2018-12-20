<?php

use Faker\Generator as Faker;


$factory->define(App\Answer::class, function (Faker $faker) {
    return [
        'make' => $faker->make,
        'model' => $faker->model,
        'produced' =>$faker->produced,
    ];
});