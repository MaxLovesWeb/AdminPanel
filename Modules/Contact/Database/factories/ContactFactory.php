<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Contact\Entities\Contact;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'status' => 'active',
    ];
});

$factory->state(Contact::class, 'email', function (Faker $faker) {
    return [
        'type' => 'email',
        'value' => $faker->safeEmail,
    ];
});

$factory->state(Contact::class, 'phone', function (Faker $faker) {
    return [
        'type' => 'phone',
        'value' => $faker->phoneNumber,
    ];
});

$factory->state(Contact::class, 'fax', function (Faker $faker) {
    return [
        'type' => 'fax',
        'value' => $faker->phoneNumber,
    ];
});