<?php

use Faker\Generator as Faker;

$factory->define(App\SpecialOffer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'discount' => $faker->numberBetween($min = 1, $max = 45),
        'expiration' => \Carbon\Carbon::tomorrow()
    ];
});
