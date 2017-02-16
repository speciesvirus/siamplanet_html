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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('subtitle');
            $table->integer('project_type_id')->unsigned()->index();
            $table->foreign('project_type_id')->references('id')->on('project_type')->onDelete('cascade');
            $table->integer('sale_type_id')->unsigned()->index();
            $table->foreign('sale_type_id')->references('id')->on('sale_type')->onDelete('cascade');
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
