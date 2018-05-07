<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Team::class, function (Faker $faker) {
    $name = ucwords($faker->words(2, true));
    $slug = str_replace(' ', '-', strtolower($name));

    return [
        'name' => $name,
        'slug' => $slug
    ];
});
