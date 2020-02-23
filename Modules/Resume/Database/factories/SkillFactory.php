<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Resume\Entities\Education;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Modules\Company\Entities\Company;

$factory->define(\Modules\Resume\Entities\Skill::class, function (Faker $faker) {

    return [
        'name' => $faker->unique()->word(),
    ];
});

