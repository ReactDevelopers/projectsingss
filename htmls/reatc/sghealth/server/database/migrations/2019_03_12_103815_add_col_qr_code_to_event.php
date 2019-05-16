<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColQrCodeToEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_event', function (Blueprint $table) {
            $table->dropForeign(['qr_code_id']);
            $table->dropColumn('qr_code_id');
        });

        Schema::table('events', function (Blueprint $table) {
           
            $table->text('address')->after('description')->nullable();
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
            $table->dropColumn('address');
        });

        Schema::table('application_event', function (Blueprint $table) {
            $table->unsignedInteger('qr_code_id')->nullable()->after('status');
            $table->foreign('qr_code_id')
                ->references('id')->on('media')
                ->onDelete('set null');
        });
    }
}
