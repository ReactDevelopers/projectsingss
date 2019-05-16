<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituteLicenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('institute_license');

        Schema::create('institute_licenses', function (Blueprint $table) {

            $table->increments('id');
            $table->string('license_name');
            $table->date('expiry_date')->nullable();

            $table->unsignedInteger('institute_id');
            $table->foreign('institute_id')
                ->references('id')->on('institutes')
                ->onDelete('cascade');

            $table->unsignedInteger('branch_id')->nullable();
            $table->foreign('branch_id')
                ->references('id')->on('branches')
                ->onDelete('cascade');

            $table->unsignedInteger('service_id')->nullable();
            $table->foreign('service_id')
                    ->references('id')->on('services')
                    ->onDelete('cascade');

            $table->enum('licence_for', ['branch', 'service'])->default('branch');

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
        Schema::dropIfExists('institute_licenses');
    }
}
