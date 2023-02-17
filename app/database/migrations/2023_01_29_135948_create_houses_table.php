<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name','100');
            $table->string('address','100');
            $table->string('lomgitude','100');
            $table->string('atitude','100');
            $table->integer('amount');
            $table->string('size','100');
            $table->string('layout','100');
            $table->text('information');
            $table->text('comment');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('profile');
            $table->rememberToken();
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
        Schema::dropIfExists('houses');
    }
}
