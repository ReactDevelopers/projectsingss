<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentTimingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_timings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('assignment_id');
            $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('cascade');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');

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
        Schema::dropIfExists('assignment_timings');
    }
}
