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
            $table->string('name');
            $table->string('main_image');
            $table->text('descriptions');
            $table->integer('category_id')->unsigned();
            $table->decimal('price');
            $table->integer('amount');
            $table->integer('is_featured')->default(0);
            $table->integer('status')->comment('new,sale...');
            $table->integer('flag')->comment('delete');
            $table->decimal('new_price')->nullable();
            $table->datetime('expired_time')->nullable();
            $table->string('short_description',255);
            $table->foreign('category_id')->references('id')->on('categories');
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
