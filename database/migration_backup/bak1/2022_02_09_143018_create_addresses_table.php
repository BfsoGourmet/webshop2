<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->integer('id');
            $table->string('country_name', 300)->nullable();
            $table->string('street', 500)->nullable();
            $table->string('street_number', 50)->nullable();
            $table->integer('zip')->nullable();
            $table->string('city', 500)->nullable();
            $table->integer('user_id');
            
            $table->primary(['id', 'user_id']);
            $table->foreign('user_id', 'fk_adresse_login1')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
