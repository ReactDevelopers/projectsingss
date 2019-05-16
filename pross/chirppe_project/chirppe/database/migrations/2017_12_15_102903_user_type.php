<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_user_type', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('type_id')->unsigned();
        $table->foreign('type_id')->references('id')->on('c_users')->onUpdate('cascade')->onDelete('cascade');
        $table->enum('user_type', array('principal','student','teacher','parent'));
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
        Schema::dropIfExists('c_user_type');
    }
}
