<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CMeal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_meal', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('type_meal_id')->unsigned();
        $table->foreign('type_meal_id')->references('id')->on('c_type_meal')->onUpdate('cascade')->onDelete('cascade');
        $table->integer('property_meal_id')->unsigned();
        $table->foreign('property_meal_id')->references('id')->on('c_property_meal')->onUpdate('cascade')->onDelete('cascade');
        $table->integer('std_id')->unsigned();
        $table->foreign('std_id')->references('id')->on('c_students')->onUpdate('cascade')->onDelete('cascade');
        $table->date('time');
        $table->string('amount');
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
        Schema::dropIfExists('c_meal');
    }
}
