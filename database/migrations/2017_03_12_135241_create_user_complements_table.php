<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserComplementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_complements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('birthdate');
            $table->string('phone', 30);
            //   $table->string('gender', 1);
            $table->string('maritalstatus', 30);
            $table->string('mother', 120);
            $table->string('father', 120);
            $table->string('nationality', 40);
            $table->string('naturality', 40);
            //   $table->string('children', 3);
            $table->string('zipcode', 10);
            $table->string('address');
            $table->string('neighborhood', 50);
            $table->string('complement', 100);
            $table->string('city', 50);
            $table->string('state', 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_complements');
    }
}
