<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColToUserCerts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_certificates', function (Blueprint $table) {
            $table->text('cert_info')->after('id');
            $table->date('certified_on')->nullable()->after('certificate_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_certificates', function (Blueprint $table) {
            $table->dropColumn('cert_info');
            $table->dropColumn('certified_on');
        });
    }
}
