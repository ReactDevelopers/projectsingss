<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WorkScheduleView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement('CREATE VIEW institute_monthly_work_schedules AS SELECT * FROM `work_schedules` GROUP BY institute_id, DATE_FORMAT(date,"%m")');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement('DROP VIEW `sg_health`.`institute_monthly_work_schedules`');
    }
}
