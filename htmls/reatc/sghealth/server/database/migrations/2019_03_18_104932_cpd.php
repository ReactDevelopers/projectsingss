<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cpd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpd', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('code',20);
            $table->unsignedInteger('cpd_credit');
            $table->string('title');
            $table->string('description');
            $table->string('role');
            $table->date('date');
            $table->unsignedInteger('document_id')->nullable(); 
            $table->foreign('document_id')
                ->references('id')->on('media')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cpd');
    }
}
