<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CTagging extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_tagging', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('std_id')->unsigned();
        $table->foreign('std_id')->references('id')->on('c_students')->onUpdate('cascade')->onDelete('cascade');
        $table->integer('parent_id')->unsigned();
        $table->foreign('parent_id')->references('id')->on('c_parents')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('c_tagging');
    }
}
