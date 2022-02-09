<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 500)->nullable();
            $table->string('prename', 500)->nullable();
            $table->string('password')->nullable();
            $table->string('email', 500)->nullable();
            $table->string('telephone_number', 500)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('username', 500)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('userscol', 45)->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreignId('cart_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
