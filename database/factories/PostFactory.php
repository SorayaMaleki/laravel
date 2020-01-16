<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text(100),
        'body' => $faker->text
    ];
});
