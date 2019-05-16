<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkScheduleUpdatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_schedule_updators', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('updator_id')->nullable();

            $table->foreign('updator_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->unsignedInteger('work_schedule_id');
            $table->foreign('work_schedule_id')
                ->references('id')->on('work_schedules')
                ->onDelete('cascade');

            $table->enum('is_auto_updated', ['Yes', 'No'])->default('No');
            $table->unsignedInteger('attempts')->default(1);
            $table->timestamps();

            $table->unique(['updator_id', 'work_schedule_id', 'is_auto_updated'], 'work_schedule_updators_uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_schedule_updators');
    }
}
