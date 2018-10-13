<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->nullable();
            $table->text('image')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('featured')->default(0);
            $table->integer('views')->default(0);
            $table->timestamps();
        });

         Schema::create('brands_lang', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status')->default(1);
            $table->boolean('featured')->default(0);
            $table->integer('brand_id')->unsigned();
            $table->string('lang');
            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->mediumText('keywords')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::dropIfExists('brands_lang');
        Schema::dropIfExists('brands');
    }
}
