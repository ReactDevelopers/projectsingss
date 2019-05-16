<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAssessmentStartDateColumnInRunningCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('running_courses', function (Blueprint $table) {
            
            $table->date('assessment_end_date')->nullable();
            $table->integer('old_db_primary_key')->nullable();
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
            
            $table->dropColumn('assessment_end_date');
            $table->dropColumn('old_db_primary_key');
        });
    }
}
