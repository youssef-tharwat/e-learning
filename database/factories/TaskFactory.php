<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->email,
        'name' => $faker->name
    ];
});
