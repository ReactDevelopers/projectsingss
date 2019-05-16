<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_event', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('event_id')->nullable();
            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->unsignedInteger('institute_id');
            $table->foreign('institute_id')
                ->references('id')->on('institutes')
                ->onDelete('cascade');
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');

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
        Schema::dropIfExists('application_event');
    }
}
