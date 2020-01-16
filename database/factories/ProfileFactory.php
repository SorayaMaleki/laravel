<?php

use Faker\Generator as Faker;

$factory->define(\App\Profile::class, function (Faker $faker) {
    return [
        'age' => $faker->numberBetween(18, 100),
        'height' => $faker->numberBetween(100, 250),
        'bio' => $faker->text
    ];
});
