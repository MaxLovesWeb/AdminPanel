<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Resume\Entities\Resume;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Modules\Resume\Entities\Education;
use Modules\Resume\Entities\Experience;

$factory->define(Resume::class, function (Faker $faker) {

    return [
        'title' => $faker->jobTitle,
        'letter' => $faker->realText(),
    ];
});
