<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CPotty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_potty', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('std_id')->unsigned();
        $table->foreign('std_id')->references('id')->on('c_students')->onUpdate('cascade')->onDelete('cascade');
        $table->string('content');
        $table->string('wet');
        $table->string('bowel');
        $table->time('start_date');
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
        Schema::dropIfExists('c_potty');
    }
}
