<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_image', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('event_id')->nullable();
            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');

            $table->unsignedInteger('media_id')->nullable();
            $table->foreign('media_id')
                ->references('id')->on('media')
                ->onDelete('cascade');

            $table->enum('is_default', ['Yes', 'No'])->default('No');

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
        Schema::dropIfExists('event_image');
    }
}
