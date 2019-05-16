<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveInstituteIdFromApplicationEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_event', function (Blueprint $table) {
            $table->dropForeign(['institute_id']);
            $table->dropColumn('institute_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('application_event', function (Blueprint $table) {
            $table->unsignedInteger('institute_id')->after('user_id');
            $table->foreign('institute_id')
                ->references('id')->on('institutes')
                ->onDelete('cascade');
        });
    }
}
