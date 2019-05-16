<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RosterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rosters', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->unsignedInteger('service_id');
            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onDelete('cascade');

            $table->unsignedInteger('branch_id');
            $table->foreign('branch_id')
                ->references('id')->on('branches')
                ->onDelete('cascade');

            $table->unsignedInteger('institute_id');
            $table->foreign('institute_id')
                ->references('id')->on('institutes')
                ->onDelete('cascade');

            $table->date('schedule_date')->nullable();
            $table->timestamp('schedule_start_time')->nullable();
            $table->timestamp('schedule_end_time')->nullable();

            $table->unsignedInteger('created_by')->nullable();
            $table->foreign('created_by')
                ->references('id')->on('users')
                ->onDelete('set null');

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
        Schema::dropIfExists('rosters');
    }
}
