<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CObservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_observation', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('std_id')->unsigned();
        $table->foreign('std_id')->references('id')->on('c_students')->onUpdate('cascade')->onDelete('cascade');
        $table->integer('teacher_id')->unsigned();
        $table->foreign('teacher_id')->references('id')->on('c_teachers')->onUpdate('cascade')->onDelete('cascade');
        $table->string('content');
        $table->enum('status', array('pending','done'));
        $table->enum('approved', array('yes','no'));
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
        Schema::dropIfExists('c_observation');
    }
}
