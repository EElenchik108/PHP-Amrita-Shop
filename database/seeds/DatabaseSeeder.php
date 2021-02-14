<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 7)->create();
        factory(App\Product::class, 100)->create();
        factory(App\User::class, 10)->create();
        factory(App\Review::class, 40)->create();   
        factory(App\Image::class, 400)->create();    
        factory(App\Article::class, 9)->create(); 
        factory(App\Like::class, 9)->create();    
    }
}
