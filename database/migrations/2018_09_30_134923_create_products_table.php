<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('product_categories_lang', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status')->default(1);
            $table->integer('product_category_id')->unsigned();
            $table->string('lang');
            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->mediumText('keywords')->nullable();
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->nullable();
            $table->integer('product_category_id')->unsigned()->nullable();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->text('image')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('featured')->default(0);
            $table->integer('views')->default(0);
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('products_lang', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status')->default(1);
            $table->boolean('featured')->default(0);
            $table->integer('product_id')->unsigned();
            $table->string('lang');
            $table->string('title');
            $table->text('content')->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('keywords')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_categories');
        Schema::dropIfExists('product_categories_lang');
        Schema::dropIfExists('products');
        Schema::dropIfExists('products_lang');
    }
}
