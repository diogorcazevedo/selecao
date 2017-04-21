<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('responsavel');
            $table->string('name');
            $table->string('email');
            $table->string('cel', 30);
            $table->string('phone', 30);
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
        Schema::dropIfExists('schools');
    }
}
