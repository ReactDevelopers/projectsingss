<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeTimeNulableBranch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->dropColumn('mon_fri_start_time');
            $table->dropColumn('mon_fri_end_time');
            $table->dropColumn('sun_start_time');
            $table->dropColumn('sun_end_time');
            $table->dropColumn('sat_start_time');
            $table->dropColumn('sat_end_time');
            $table->dropColumn('ph_start_time');
            $table->dropColumn('ph_end_time');
        });

        Schema::table('branches', function (Blueprint $table) {
            $table->time('mon_fri_start_time')->after('institute_id')->nullable();
            $table->time('mon_fri_end_time')->after('mon_fri_start_time')->nullable();
            $table->time('sun_start_time')->after('mon_fri_end_time')->nullable();
            $table->time('sun_end_time')->after('sun_start_time')->nullable();
            $table->time('sat_start_time')->after('sun_end_time')->nullable();
            $table->time('sat_end_time')->after('sat_start_time')->nullable();
            $table->time('ph_start_time')->after('sat_end_time')->nullable();
            $table->time('ph_end_time')->after('ph_start_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('branches', function (Blueprint $table) {
            $table->dropColumn('mon_fri_start_time');
            $table->dropColumn('mon_fri_end_time');
            $table->dropColumn('sun_start_time');
            $table->dropColumn('sun_end_time');
            $table->dropColumn('sat_start_time');
            $table->dropColumn('sat_end_time');
            $table->dropColumn('ph_start_time');
            $table->dropColumn('ph_end_time');
        });
        
        Schema::table('branches', function (Blueprint $table) {
            $table->time('mon_fri_start_time')->after('institute_id');
            $table->time('mon_fri_end_time')->after('mon_fri_start_time');
            $table->time('sun_start_time')->after('mon_fri_end_time');
            $table->time('sun_end_time')->after('sun_start_time');
            $table->time('sat_start_time')->after('sun_end_time');
            $table->time('sat_end_time')->after('sat_start_time');
            $table->time('ph_start_time')->after('sat_end_time');
            $table->time('ph_end_time')->after('ph_start_time');
        });
    }
}
