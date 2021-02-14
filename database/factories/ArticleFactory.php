<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $title = $faker->sentence(3);
    return [
        'name' => $faker->sentence(3),
        'slug' => Str::slug($title, '-'),
        'img' => 'https://loremflickr.com/320/240', 
        'topic' => $faker->words(3, true),              
        'description' => $faker->words(10, true),
        'text' => $faker->paragraphs(3, true),
        'author' => $faker->name,        
    ];
});
