<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Person\Entities\Person;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Person::class, function (Faker $faker) {

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'title' => $faker->title(),
        'about_me' => $faker->realText(),
        'birthDate' => $faker->date(),
    ];
});

