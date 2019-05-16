<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAllowInScheduledEmailColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event', function (Blueprint $table) {
            $table->enum('allow_in_scheduled_email',['Y','N'])->default('Y')->after('group_id'); // 1- to, 2- cc
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('event', function (Blueprint $table) {
            $table->dropColumn('allow_in_scheduled_email');
        });
    }
}
