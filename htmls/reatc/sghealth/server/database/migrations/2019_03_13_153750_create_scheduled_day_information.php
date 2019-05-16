<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduledDayInformation extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduled_day_informations', function (Blueprint $table) {
            
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

            $table->string('comments')->default('');
            $table->json('options')->nullable();
            
            $table->unique(['institute_id', 'branch_id', 'service_id','date'],'schedule_day_unique_key');


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
        Schema::dropIfExists('scheduled_day_informations');
    }
}
