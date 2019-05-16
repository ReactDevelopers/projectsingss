<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 190);
            $table->char('branch_code', 10);
            $table->string('address', 300);

            $table->unsignedInteger('institute_id');
            $table->foreign('institute_id')
                ->references('id')->on('institutes')
                ->onDelete('cascade');

            $table->time('mon_fri_start_time');
            $table->time('mon_fri_end_time');
            $table->time('sun_start_time');
            $table->time('sun_end_time');
            $table->time('sat_start_time');
            $table->time('sat_end_time');
            $table->time('ph_start_time');
            $table->time('ph_end_time');
            $table->json('service_ids')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['branch_code', 'institute_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
