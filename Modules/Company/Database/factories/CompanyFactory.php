<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Company\Entities\Company;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Company::class, function (Faker $faker) {

    $name = $faker->unique()->company;
    $slug = Str::slug($name);

    return [
        'name' => $name,
        'slug' => $slug,
    ];
});

