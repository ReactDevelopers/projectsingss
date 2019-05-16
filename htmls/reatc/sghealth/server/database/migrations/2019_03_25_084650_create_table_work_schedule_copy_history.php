<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWorkScheduleCopyHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_schedule_copy_history', function (Blueprint $table) {
            $table->increments('id');

            $table->date('from_month');
            $table->date('to_month');
            
            $table->unsignedInteger('institute_id');
            $table->foreign('institute_id')
                ->references('id')->on('institutes')
                ->onDelete('cascade');
                
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->json('old_schedule_data')->nullable();
            $table->json('new_schedule_data')->nullable();

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
        Schema::dropIfExists('work_schedule_copy_history');
    }
}
