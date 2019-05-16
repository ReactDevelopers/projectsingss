<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunningCourseBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('running_course_booking', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('running_course_id')->unsigned(); 
            $table->foreign('running_course_id')->references('id')->on('running_courses')->onDelete('cascade');

            $table->integer('user_id')->unsigned(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('approver_id')->unsigned(); 
            $table->foreign('approver_id')->references('id')->on('users')->onDelete('cascade');

            $table->enum('status',['Absent','Attended','Cancelled','Pending','Successfully Registered']);
            $table->timestamp('last_email_sent');

            $table->enum('assessment_result',['Pass','Fail'])->nullable()->default(null);
            $table->enum('is_trainer',['Yes','No'])->default('No');
            $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('running_course_booking', function (Blueprint $table) {

            $table->dropForeign(['running_course_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['approver_id']);
        });

        Schema::dropIfExists('running_course_booking');
    }
}
