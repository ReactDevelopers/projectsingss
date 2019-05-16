<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_event', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('event_id')->nullable();
            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');

                $table->unsignedInteger('certificate_id')->nullable();
                $table->foreign('certificate_id')
                    ->references('id')->on('certificates')
                    ->onDelete('cascade');

            $table->unique(['event_id', 'certificate_id'], 'certificate_event_ec');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificate_event');
    }
}
