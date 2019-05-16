<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCertCol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('user_certificates')->delete();
        
        Schema::table('user_certificates', function (Blueprint $table) {
            $table->dropForeign(['certificate_id']);
            $table->dropForeign(['user_id']);

            $table->dropUnique(['user_id','certificate_id']);
            $table->dropColumn('certificate_id');
            $table->dropColumn('user_id');
        });

        Schema::table('user_certificates', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->after('cert_info');
            $table->unsignedInteger('certificate_id')->after('user_id')->nullable();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('certificate_id')
                ->references('id')->on('certificates')
                ->onDelete('cascade');


            $table->unique(['user_id','certificate_id']);
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
            $table->dropForeign(['user_id']);
            $table->dropForeign(['certificate_id']);

            $table->dropUnique(['user_id','certificate_id']);

            $table->dropColumn('user_id');
            $table->dropColumn('certificate_id');

        });

        Schema::table('user_certificates', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->after('cert_info');
            $table->unsignedInteger('certificate_id')->after('user_id');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('certificate_id')
                ->references('id')->on('certificates')
                ->onDelete('cascade');



            $table->unique(['user_id','certificate_id']);
        });



    }
}
