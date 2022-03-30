<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('id');
            $table->string('title', 500)->nullable();
            $table->float('price')->nullable();
            $table->integer('stock')->nullable();
            $table->string('image_path', 1000)->nullable();
            $table->string('description', 2000)->nullable();
            $table->integer('producer_id');
            
            $table->primary(['id', 'producer_id']);
            $table->foreign('producer_id', 'products_ibfk_1')->references('id')->on('producers')->onDelete('restrict')->onUpdate('restrict');
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
