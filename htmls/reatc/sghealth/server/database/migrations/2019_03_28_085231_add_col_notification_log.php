<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColNotificationLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cert_expiry_notification_logs', function (Blueprint $table) {
            $table->enum('month',[6,3])->after('expired_on');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cert_expiry_notification_logs', function (Blueprint $table) {
            $table->dropColumn('month');
        });
    }
}
