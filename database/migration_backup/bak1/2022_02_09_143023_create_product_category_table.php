<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_category', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('category_id');
            $table->integer('product_id');
            
            $table->primary(['id', 'category_id', 'product_id']);
            $table->foreign('product_id', 'fk_produkt_kategorie_has_produkt_produkt1')->references('id')->on('products')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('category_id', 'fk_produkt_kategorie_has_produkt_produkt_kategorie1')->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_category');
    }
}
