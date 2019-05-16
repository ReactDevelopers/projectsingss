<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseAttendeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_attendees', function (Blueprint $table) {

            $table->increments('id');
            
            $table->integer('running_course_id')->unsigned(); 
            $table->foreign('running_course_id')->references('id')->on('running_courses')->onDelete('cascade');
            
            $table->integer('user_id')->unsigned(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamp('start_time');
            $table->timestamp('end_time')->nullable();
            $table->enum('result',['Absent','Attended','Cancelled','Registered']);
            $table->enum('assessment_result',['Pass','Fail'])->nullable()->default(null);
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
        Schema::table('course_attendees', function (Blueprint $table) {

            $table->dropForeign(['running_course_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('course_attendees');
    }
}
