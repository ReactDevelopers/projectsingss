<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateInstituteLicenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('institute_licenses')->delete();

        Schema::table('institute_licenses', function (Blueprint $table) {
            $table->dropColumn('license_name');
            $table->dropColumn('licence_for');

            $table->unsignedInteger('institute_license_id');
            $table->foreign('institute_license_id')
                ->references('id')->on('institute_license')
                ->onDelete('cascade');

            $table->unsignedInteger('license_id');
            $table->foreign('license_id')
                ->references('id')->on('licenses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('institute_licenses', function (Blueprint $table) {

            $table->string('license_name');
            $table->enum('licence_for', ['branch', 'service'])->default('branch');
            $table->dropForeign(['institute_license_id']);
            $table->dropForeign(['license_id']);
            $table->dropColumn('institute_license_id');
            $table->dropColumn('license_id');
        });
    }
}
