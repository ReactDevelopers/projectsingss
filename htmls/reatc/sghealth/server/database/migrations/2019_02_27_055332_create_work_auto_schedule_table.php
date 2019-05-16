<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkAutoScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_auto_schedules', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('institute_id');

            $table->foreign('institute_id')
            ->references('id')->on('institutes')
            ->onDelete('cascade');

            $table->unsignedInteger('branch_id');
            $table->foreign('branch_id')
                ->references('id')->on('branches')
                ->onDelete('cascade');

            $table->unsignedInteger('service_id');
            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onDelete('cascade');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->enum('schedule_type', ['weekly', 'daily'])->default('weekly');

            $table->date('schedule_strat_date')->nullable();
            $table->date('scheduled_till_date')->nullable();

            $table->enum('status', ['Pending','Active', 'Running', 'Closed'])->default('Pending');
            $table->json('options')->nullable();
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
        Schema::dropIfExists('work_auto_schedules');
    }
}
