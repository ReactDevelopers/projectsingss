<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_schedules', function (Blueprint $table) {


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

            $table->date('date');

            $table->unsignedInteger('user_id');
                $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');

            $table->unsignedInteger('created_by')->nullable();
                $table->foreign('created_by')
                    ->references('id')->on('users')
                    ->onDelete('set null');

            $table->unsignedInteger('updated_by')->nullable();
                $table->foreign('updated_by')
                    ->references('id')->on('users')
                    ->onDelete('set null');

            $table->unsignedInteger('work_auto_schedule_id')->nullable();
                $table->foreign('work_auto_schedule_id')
                    ->references('id')->on('work_auto_schedules')
                    ->onDelete('set null');

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
        Schema::dropIfExists('work_schedules');
    }
}
