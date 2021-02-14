<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('slug', 128);
            $table->string('img', 128)->nullable();
            $table->float('price');
            $table->text('description')->nullable();
            $table->string('size', 128)->nullable();
            $table->string('metal', 128)->nullable();
            $table->string('stone', 128)->nullable();
            $table->boolean('availability')->default(0);            
            $table->boolean('recommended')->default(0);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
