<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Account\Entities\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {

    $gender = ['female', 'male'];

    return [
        'gender' => $gender[array_rand($gender, 1)],
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'title' => $faker->title(),
        'birthDate' => $faker->date(),
        'birthPlace' => $faker->countryCode,
        'faxNumber' => $faker->phoneNumber,
        'jobTitle' => $faker->jobTitle,
        'biography' => $faker->realText(),
        'nationality' => $faker->countryCode,
    ];
});
