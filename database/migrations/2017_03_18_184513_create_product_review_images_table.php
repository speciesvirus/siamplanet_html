<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductReviewImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_review_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_review_id')->unsigned()->index();
            $table->foreign('product_review_id')->references('id')->on('product_reviews')->onDelete('cascade');
            $table->string('image');
            $table->integer('sort')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_review_images');
    }
}
