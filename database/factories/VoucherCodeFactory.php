<?php

use Faker\Generator as Faker;

$factory->define(App\VoucherCode::class, function (Faker $faker) {
    return [
        'code' => str_random(10),
        'special_offer_id' => $faker->randomDigitNotNull,
        'recipient_id' => $faker->randomDigitNotNull
    ];
});
