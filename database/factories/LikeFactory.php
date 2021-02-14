<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Like;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 12),
        'product_id' => $faker->numberBetween(1, 100),
    ];
});
