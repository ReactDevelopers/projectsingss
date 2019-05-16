<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJobStartEndTimeInWorkScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_schedules', function (Blueprint $table) {
            //

            $table->time('start_time')->nullable()->after('date');
            $table->time('end_time')->nullable()->after('start_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_schedules', function (Blueprint $table) {
            
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
        });
    }
}
