<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Resume\Entities\Experience;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Modules\Company\Entities\Company;


$factory->define(Experience::class, function (Faker $faker) {

    return [
        'title' => $faker->jobTitle,
        'company_id' => factory(Company::class),
        'description' => $faker->text,
        'start_date' => $faker->dateTimeBetween('-8 years', '-5 years'),
        'end_date' => $faker->dateTimeBetween('-5 years', '-2 years'),
    ];
});

