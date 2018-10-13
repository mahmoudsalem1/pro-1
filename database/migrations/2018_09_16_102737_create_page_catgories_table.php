<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageCatgoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('page_categories_lang', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status')->default(1);
            $table->integer('page_category_id')->unsigned();
            $table->string('lang');
            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->mediumText('keywords')->nullable();
            $table->foreign('page_category_id')->references('id')->on('page_categories')->onDelete('cascade');
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
        Schema::dropIfExists('page_categories_lang');
        Schema::dropIfExists('page_categories');
    }
}
