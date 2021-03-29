<?php
namespace Database\Factories;
use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text(100),
        'body' => $faker->text
    ];
});
