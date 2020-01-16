<?php

use Faker\Generator as Faker;

$factory->define(\App\Tag::class, function (Faker $faker) {
    $title = $faker->text(100);
    return [
        'title' => $title,
        'slug' => str_slug($title),
    ];
});
