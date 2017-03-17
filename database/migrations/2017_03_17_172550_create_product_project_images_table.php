<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductProjectImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_project_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_project_id')->unsigned()->index();
            $table->foreign('product_project_id')->references('id')->on('product_projects')->onDelete('cascade');
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
        Schema::dropIfExists('product_project_images');
    }
}
