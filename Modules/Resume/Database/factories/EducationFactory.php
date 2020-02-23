<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Resume\Entities\Education;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Modules\Company\Entities\Company;

$factory->define(Education::class, function (Faker $faker) {

    return [
        'company_id' => factory(Company::class),
        'description' => $faker->text,
        'title' => $faker->jobTitle,
        'course' => $faker->jobTitle,
        'start_date' => $faker->dateTimeBetween('-12 years', '-8 years'),
        'end_date' => $faker->dateTimeBetween('-5 years', '-2 years'),
    ];
});

