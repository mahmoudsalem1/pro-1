<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('image')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('sliders_lang', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status')->default(1);
            $table->integer('slider_id')->unsigned();
            $table->string('lang');
            $table->string('title');
            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade');
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
        Schema::dropIfExists('sliders_lang');
        Schema::dropIfExists('sliders');
    }
}
