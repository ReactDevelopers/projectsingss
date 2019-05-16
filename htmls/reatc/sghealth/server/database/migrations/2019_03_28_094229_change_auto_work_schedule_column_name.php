<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAutoWorkScheduleColumnName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('work_auto_schedules')->where('id', '>=', 1)->delete();

        Schema::table('work_auto_schedules', function (Blueprint $table) {
            //
            $table->dropColumn('schedule_strat_date');
            $table->date('auto_schedule_next_date');
            $table->date('schedule_start_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_auto_schedules', function (Blueprint $table) {
            //
            $table->date('schedule_strat_date')->nullable();
            $table->dropColumn('auto_schedule_next_date');
            $table->dropColumn('schedule_start_date');
        });
    }
}
