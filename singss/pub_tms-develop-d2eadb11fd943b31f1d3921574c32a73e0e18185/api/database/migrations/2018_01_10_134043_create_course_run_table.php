<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseRunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('running_courses', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->integer('available_slots')->unsigned()->default(0);
            $table->text('remarks');
            $table->enum('course_run_type',['Normal','Consecutive']);
            $table->date('assessment_start_date')->nullable();
            $table->text('vendor');
            $table->text('special_requirement');
            $table->date('closing_date')->nullable();            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('running_course_dates', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('running_course_id')->unsigned(); 
            $table->foreign('running_course_id')->references('id')->on('running_courses')->onDelete('cascade');
            $table->date('start_date');           
            $table->date('end_date');          
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('running_courses', function (Blueprint $table) {

            $table->dropForeign(['course_id']);
        });

        Schema::table('running_course_dates', function (Blueprint $table) {

            $table->dropForeign(['running_course_id']);
        });

        Schema::dropIfExists('running_courses');
        Schema::dropIfExists('running_course_dates');
    }
}
