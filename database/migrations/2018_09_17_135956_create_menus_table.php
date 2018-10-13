<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link')->nullable();
            $table->string('target')->default('_self');
            $table->string('link_method')->nullable();
            $table->string('icon')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('ordering')->default(1);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('menus_lang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->string('lang');
            $table->string('title')->nullable();
            $table->boolean('status')->default(1);
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
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
        Schema::dropIfExists('menus_lang');
        Schema::dropIfExists('menus');
    }
}
