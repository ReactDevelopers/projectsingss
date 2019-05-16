<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CTeachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_teachers', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('c_users')->onUpdate('cascade')->onDelete('cascade');
        $table->enum('gender', array('male','female'));
        $table->date('date_of_birth');
        $table->string('address');
        $table->string('postal_code',15);
        $table->string('invitation_code');
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
        Schema::dropIfExists('c_teachers');
    }
}
