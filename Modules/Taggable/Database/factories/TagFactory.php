<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Taggable\Entities\Tag;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(Tag::class, function (Faker $faker) {


    $name = $faker->word;
    $slug = Str::slug($name);

    return [
        'name' => $name,
        'slug' => $slug,
    ];

});

