<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Resume\Entities\Training;
use Modules\Company\Entities\Company;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Training::class, function (Faker $faker) {

    return [
        'title' => $faker->jobTitle,
        'company_id' => factory(Company::class),
        'description' => $faker->text,
        'start_date' => $faker->dateTimeBetween('-15 years', '-10 years'),
        'end_date' => $faker->dateTimeBetween('-5 years', '-2 years'),
    ];
});

