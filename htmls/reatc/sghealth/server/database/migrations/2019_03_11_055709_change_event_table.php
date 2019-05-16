<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['qr_code_id']);
            $table->dropColumn('qr_code_id');
            $table->dropColumn('manager_email');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->string('manager_email')->default('')->nullable()->after('manager_id');
        });

        Schema::table('application_event', function (Blueprint $table) {
            $table->unsignedInteger('qr_code_id')->nullable()->after('status');
            $table->foreign('qr_code_id')
                ->references('id')->on('media')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('manager_email');
            $table->unsignedInteger('qr_code_id')->nullable()->after('event_end_time');
            $table->foreign('qr_code_id')
                ->references('id')->on('media')
                ->onDelete('set null');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->string('manager_email')->default('')->after('manager_id');
        });

        Schema::table('application_event', function (Blueprint $table) {
            $table->dropForeign(['qr_code_id']);
            $table->dropColumn('qr_code_id');
        });
    }
}
