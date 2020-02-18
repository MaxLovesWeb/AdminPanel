<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Addresses\Entities\Address;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'country_code' => $faker->countryCode,
        'street' => $faker->streetAddress,
        'state' => $faker->state,
        'city' => $faker->city,
        'postcode' => $faker->postcode,
    ];
});

$factory->state(Address::class, 'primary', [
        'is_primary' => true,
    ]);

$factory->state(Address::class, 'shipping', [
    'is_shipping' => true,
]);

$factory->state(Address::class, 'billing', [
    'is_billing' => true,
]);
