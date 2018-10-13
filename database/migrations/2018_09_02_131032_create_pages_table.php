<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->nullable();
            $table->text('image')->nullable();
            $table->text('modules')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('views')->default(0);
            $table->timestamps();
        });

        Schema::create('pages_lang', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status')->default(1);
            $table->integer('page_id')->unsigned();
            $table->string('lang');
            $table->string('title');
            $table->text('content')->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('keywords')->nullable();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
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
        Schema::dropIfExists('pages_lang');
        Schema::dropIfExists('pages');
    }
}
