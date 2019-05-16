<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituteLicense extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institute_license', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('institute_id');
            $table->foreign('institute_id')
                ->references('id')->on('institutes')
                ->onDelete('cascade');

            $table->unsignedInteger('license_id');
            $table->foreign('license_id')
                ->references('id')->on('licenses')
                ->onDelete('cascade');
            $table->enum('is_branch_license', ['Yes', 'No'])->default('Yes');
            $table->enum('is_service_license', ['Yes', 'No'])->default('No');

            $table->unique(['institute_id', 'license_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institute_license');
    }
}
