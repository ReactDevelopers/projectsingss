<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_event', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('event_id')->nullable();
            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->unique(['event_id', 'user_id']);

            $table->unsignedInteger('created_by')->nullable();
            $table->foreign('created_by')
                ->references('id')->on('users')
                ->onDelete('set null');

            $table->unsignedInteger('updated_by')->nullable();
            $table->foreign('updated_by')
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
        Schema::dropIfExists('attendance_event');
    }
}
