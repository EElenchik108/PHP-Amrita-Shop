<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $title = $faker->sentence(3);
    $categories = \App\Category::all()->pluck('id')->toArray();
   
    return [
        'name' => $faker->sentence(3),
        'slug' => Str::slug($title, '-'),
        'img' => 'https://loremflickr.com/320/240',
        'price' => $faker->randomFloat(2, 2000, 300000),
        'description' => $faker->paragraphs(3, true),
        'availability' => $faker->randomFloat(0, 0, 1),
        'recommended' => $faker->randomFloat(0, 0, 1),       
        'metal' => $faker->bothify('Gold ##??'),
        'size' => $faker->asciify('Size ***'),
        'stone' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'category_id' => $faker->shuffle($categories)[0],
    ];
});



            
                     
            