<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CClassroomStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_classroom_student', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('class_id')->unsigned();
        $table->foreign('class_id')->references('id')->on('c_classroom')->onUpdate('cascade')->onDelete('cascade');
        $table->integer('std_id')->unsigned();
        $table->foreign('std_id')->references('id')->on('c_students')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('c_classroom_student');
    }
}
