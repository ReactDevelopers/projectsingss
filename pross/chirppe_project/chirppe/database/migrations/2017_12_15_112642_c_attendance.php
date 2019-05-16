<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CAttendance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_attendance', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('c_students')->onUpdate('cascade')->onDelete('cascade');
        $table->integer('class_id')->unsigned();
        $table->foreign('class_id')->references('id')->on('c_classroom')->onUpdate('cascade')->onDelete('cascade');
        $table->enum('present', array('active','inactive'));
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
        Schema::dropIfExists('c_attendance');
    }
}
