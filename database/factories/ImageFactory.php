<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    $products = \App\Product::all()->pluck('id')->toArray();
    return [
        'img' => 'https://loremflickr.com/320/240',        
        'product_id' => $faker->shuffle($products)[0],
        'created_at' => $faker->dateTime($max = 'now', $timezone = 'Europe/Paris'),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = 'Europe/Paris'),
    ];
});
