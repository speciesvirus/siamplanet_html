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
            $table->integer('product_type_id')->unsigned()->index();
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('no action');
            $table->integer('product_sale_id')->unsigned()->index();
            $table->foreign('product_sale_id')->references('id')->on('product_sales')->onDelete('no action');
            $table->decimal('unit', 5, 2)->unsigned();
            $table->integer('product_unit_id')->unsigned()->index();
            $table->foreign('product_unit_id')->references('id')->on('product_units')->onDelete('no action');
            $table->integer('amount')->unsigned();
            $table->string('name');
            $table->string('complete');
            $table->text('content');
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
