<?php

use Faker\Generator as Faker;

$factory->define(\App\Repositories\Models\Todo::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence
    ];
});
