<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CPropertyMeal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_property_meal', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('type_meal_id')->unsigned();
        $table->foreign('type_meal_id')->references('id')->on('c_type_meal')->onUpdate('cascade')->onDelete('cascade');
        $table->string('items');
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
        Schema::dropIfExists('c_property_meal');
    }
}
