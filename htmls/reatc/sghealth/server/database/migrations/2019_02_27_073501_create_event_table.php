<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('manager_id')->nullable();
            $table->foreign('manager_id')
                ->references('id')->on('users')
                ->onDelete('set null');

            $table->string('manager_email')->default('');

            $table->unsignedInteger('institute_id');
            $table->foreign('institute_id')
                ->references('id')->on('institutes')
                ->onDelete('cascade');

            $table->string('title')->default('');
            $table->string('description')->default('');

            $table->json('options')->nullable();

            $table->enum('attendance_should_be', ['Yes', 'No'])->default('Yes');

            $table->date('event_date');
            $table->time('event_start_time');
            $table->time('event_end_time');

            $table->unsignedInteger('qr_code_id')->nullable();
            $table->foreign('qr_code_id')
                ->references('id')->on('media')
                ->onDelete('set null');

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
        Schema::dropIfExists('events');
    }
}
